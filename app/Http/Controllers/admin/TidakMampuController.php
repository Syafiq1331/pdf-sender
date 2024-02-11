<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SK_TidakMampu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TidakMampuController extends Controller
{
    public function index()
    {
        $tidakMampu = SK_TidakMampu::where(function ($query) {
            $query->where('verifikasi', 'belum-verifikasi')
                ->orWhere('status', 'pending');
        })
            ->orWhere(function ($query) {
                $query->where('verifikasi', 'ter-verifikasi')
                    ->where('status', 'ditolak');
            })
            ->get();
        return view('admin.tidakMampu.index', compact('tidakMampu'));
    }

    public function getDataFromUser()
    {
        return view('admin.tidakMampu.insert-data');
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
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nama_ayah' => 'required|string',
            'umur_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'penghasilan_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'umur_ibu' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
            'penghasilan_ibu' => 'required|string',
            'no_whatsapp' => 'required|string',
            'status' => 'nullable|in:ter-acc,pending,ditolak',
            'verifikasi' => 'nullable|in:ter-verifikasi,belum-verifikasi',
        ]);

        // Menggunakan transaksi database
        DB::beginTransaction();

        try {
            // Simpan data ke dalam database
            $skTidakMampu = new SK_TidakMampu();
            $skTidakMampu->fill($validatedData);
            $skTidakMampu->save();

            // Commit transaksi jika berhasil
            DB::commit();

            return redirect()->url('/admin/surat-keterangan-tidak-mampu')
                ->with('success', 'Data SK Tidak Mampu berhasil disimpan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data SK Tidak Mampu.');
        }
    }

    public function envelopeOut()
    {
        $tidakMampu = SK_TidakMampu::where('verifikasi', 'ter-verifikasi')
            ->where('status', 'ter-acc')
            ->get();
        return view('admin.tidakMampu.outEnvelope', compact('tidakMampu'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:ter-acc,pending,ditolak',
        ]);

        $skBelumMenikah = SK_TidakMampu::findOrFail($id);
        $skBelumMenikah->status = $request->status;
        $skBelumMenikah->save();

        return redirect()->back()->with('success', 'Status SK Belum Menikah berhasil diperbarui.');
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'verifikasi' => 'required|in:ter-verifikasi,belum-verifikasi',
        ]);

        $skBelumMenikah = SK_TidakMampu::findOrFail($id);
        $skBelumMenikah->verifikasi = $request->verifikasi;
        $skBelumMenikah->save();

        return redirect()->back()->with('success', 'Verifikasi SK Belum Menikah berhasil diperbarui.');
    }

    public function generatePdf($id)
    {
        $skBelumMenikah = SK_TidakMampu::findOrFail($id);

        // Load view dengan data SK Belum Menikah yang sesuai dengan ID
        $pdf = PDF::loadView('admin.belumMenikah.pdf', compact('skBelumMenikah'));

        // Jika Anda ingin menampilkan PDF di browser tanpa mengunduhnya, gunakan method 'stream' 
        // return $pdf->stream('sk_belum_menikah.pdf');

        // Jika Anda ingin mengunduh PDF, gunakan method 'download'
        return $pdf->download('sk_belum_menikah_' . $id . '.pdf');
    }
}
