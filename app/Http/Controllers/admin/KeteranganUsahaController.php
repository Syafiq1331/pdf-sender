<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SK_KeteranganUsaha;
use Illuminate\Http\Request;
use PDF;

class KeteranganUsahaController extends Controller
{
    public function index()
    {
        $keteranganUsaha = SK_KeteranganUsaha::where(function ($query) {
            $query->where('verifikasi', 'belum-verifikasi')
                ->orWhere('status', 'pending');
        })
            ->orWhere(function ($query) {
                $query->where('verifikasi', 'ter-verifikasi')
                    ->where('status', 'ditolak');
            })
            ->get();
        return view('admin.keteranganUsaha.index', compact('keteranganUsaha'));
    }

    public function getDataFromUser()
    {
        return view('admin.keteranganUsaha.insert-data');
    }

    public function storeDataFromUser(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'status_perkawinan' => 'required|in:menikah,belum menikah',
            'no_whatsapp' => 'required|string',
            'status' => 'nullable|in:ter-acc,pending,ditolak',
            'verifikasi' => 'nullable|in:ter-verifikasi,belum-verifikasi',
        ]);

        // Menggunakan transaksi database
        DB::beginTransaction();

        try {
            // Simpan data ke dalam database
            $skKeteranganUsaha = new SkKeteranganUsaha();
            $skKeteranganUsaha->fill($validatedData);
            $skKeteranganUsaha->save();

            // Commit transaksi jika berhasil
            DB::commit();

            return redirect()->route('sk-keterangan-usaha.index')
                ->with('success', 'Data SK Keterangan Usaha berhasil disimpan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data SK Keterangan Usaha.');
        }
    }

    public function envelopeOut()
    {
        $keteranganUsaha = SK_KeteranganUsaha::where('verifikasi', 'ter-verifikasi')
            ->where('status', 'ter-acc')
            ->get();
        return view('admin.keteranganUsaha.outEnvelope', compact('keteranganUsaha'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:ter-acc,pending,ditolak',
        ]);

        $skBelumMenikah = SK_KeteranganUsaha::findOrFail($id);
        $skBelumMenikah->status = $request->status;
        $skBelumMenikah->save();

        return redirect()->back()->with('success', 'Status SK Belum Menikah berhasil diperbarui.');
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'verifikasi' => 'required|in:ter-verifikasi,belum-verifikasi',
        ]);

        $skBelumMenikah = SK_KeteranganUsaha::findOrFail($id);
        $skBelumMenikah->verifikasi = $request->verifikasi;
        $skBelumMenikah->save();

        return redirect()->back()->with('success', 'Verifikasi SK Belum Menikah berhasil diperbarui.');
    }

    public function generatePdf($id)
    {
        $skBelumMenikah = SK_KeteranganUsaha::findOrFail($id);

        // Load view dengan data SK Belum Menikah yang sesuai dengan ID
        $pdf = PDF::loadView('admin.belumMenikah.pdf', compact('skBelumMenikah'));

        // Jika Anda ingin menampilkan PDF di browser tanpa mengunduhnya, gunakan method 'stream' 
        // return $pdf->stream('sk_belum_menikah.pdf');

        // Jika Anda ingin mengunduh PDF, gunakan method 'download'
        return $pdf->download('sk_belum_menikah_' . $id . '.pdf');
    }
}
