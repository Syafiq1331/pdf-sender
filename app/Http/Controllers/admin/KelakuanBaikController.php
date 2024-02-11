<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SK_KelakuanBaik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class KelakuanBaikController extends Controller
{
    public function index()
    {
        $kelakuanBaik = SK_KelakuanBaik::where(function ($query) {
            $query->where('verifikasi', 'belum-verifikasi')
                ->orWhere('status', 'pending');
        })
            ->orWhere(function ($query) {
                $query->where('verifikasi', 'ter-verifikasi')
                    ->where('status', 'ditolak');
            })
            ->get();
        return view('admin.kelakuanBaik.index', compact('kelakuanBaik'));
    }

    public function getDataFromUser()
    {
        return view('admin.kelakuanBaik.insert-data');
    }

    public function storeDataFromUser(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'agama' => 'required|string',
            'status' => 'required|string',
            'dusun_tinggal' => 'required|string',
            'rt_rw' => 'required|string',
            'no_whatsapp' => 'required|string',
            'status_surat' => 'nullable|in:ter-acc,pending,ditolak',
            'verifikasi' => 'nullable|in:ter-verifikasi,belum-verifikasi',
        ]);

        // Menggunakan transaksi database
        DB::beginTransaction();

        try {
            // Simpan data ke dalam database
            $skKelakuanBaik = new SK_KelakuanBaik();
            $skKelakuanBaik->fill($validatedData);
            $skKelakuanBaik->save();

            // Commit transaksi jika berhasil
            DB::commit();

            return redirect()->route('sk-kelakuan-baik.index')
                ->with('success', 'Data SK Kelakuan Baik berhasil disimpan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data SK Kelakuan Baik.');
        }
    }

    public function envelopeOut()
    {
        $kelakuanBaik = SK_KelakuanBaik::where('verifikasi', 'ter-verifikasi')
            ->where('status', 'ter-acc')
            ->get();
        return view('admin.kelakuanBaik.outEnvelope', compact('kelakuanBaik'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:ter-acc,pending,ditolak',
        ]);

        $skBelumMenikah = SK_KelakuanBaik::findOrFail($id);
        $skBelumMenikah->status = $request->status;
        $skBelumMenikah->save();

        return redirect()->back()->with('success', 'Status SK Belum Menikah berhasil diperbarui.');
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'verifikasi' => 'required|in:ter-verifikasi,belum-verifikasi',
        ]);

        $skBelumMenikah = SK_KelakuanBaik::findOrFail($id);
        $skBelumMenikah->verifikasi = $request->verifikasi;
        $skBelumMenikah->save();

        return redirect()->back()->with('success', 'Verifikasi SK Belum Menikah berhasil diperbarui.');
    }

    public function generatePdf($id)
    {
        $skBelumMenikah = SK_KelakuanBaik::findOrFail($id);

        // Load view dengan data SK Belum Menikah yang sesuai dengan ID
        $pdf = PDF::loadView('admin.belumMenikah.pdf', compact('skBelumMenikah'));

        // Jika Anda ingin menampilkan PDF di browser tanpa mengunduhnya, gunakan method 'stream' 
        // return $pdf->stream('sk_belum_menikah.pdf');

        // Jika Anda ingin mengunduh PDF, gunakan method 'download'
        return $pdf->download('sk_belum_menikah_' . $id . '.pdf');
    }
}
