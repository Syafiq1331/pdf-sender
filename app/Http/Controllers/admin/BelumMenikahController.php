<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SK_BelumMenikah;
use Illuminate\Http\Request;
use PDF;

class BelumMenikahController extends Controller
{
    public function index()
    {
        $skBelumMenikahs = SK_BelumMenikah::where(function ($query) {
            $query->where('verifikasi', 'belum-verifikasi')
                ->orWhere('status', 'pending');
        })
            ->orWhere(function ($query) {
                $query->where('verifikasi', 'ter-verifikasi')
                    ->where('status', 'ditolak');
            })
            ->get();
        return view('admin.belumMenikah.index', compact('skBelumMenikahs'));
    }

    public function envelopeOut()
    {
        $skBelumMenikahs = SK_BelumMenikah::where('verifikasi', 'ter-verifikasi')
            ->where('status', 'ter-acc')
            ->get();
        return view('admin.belumMenikah.outEnvelope', compact('skBelumMenikahs'));
    }

    public function getDataFromUser()
    {
        return view('admin.belumMenikah.insert-data');
    }


    public function storeDataFromUser(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'required|string|max:255',
            'no_whatsapp' => 'required|string|max:15',
        ]);

        // Simpan data ke dalam database
        SK_BelumMenikah::create($validatedData);

        // Redirect ke halaman yang sesuai atau berikan pesan sukses
        return redirect('/admin/surat-keterangan-belum-menikah')->with('success', 'Data SK Belum Menikah berhasil ditambahkan.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:ter-acc,pending,ditolak',
        ]);

        $skBelumMenikah = SK_BelumMenikah::findOrFail($id);
        $skBelumMenikah->status = $request->status;
        $skBelumMenikah->save();

        return redirect()->back()->with('success', 'Status SK Belum Menikah berhasil diperbarui.');
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'verifikasi' => 'required|in:ter-verifikasi,belum-verifikasi',
        ]);

        $skBelumMenikah = SK_BelumMenikah::findOrFail($id);
        $skBelumMenikah->verifikasi = $request->verifikasi;
        $skBelumMenikah->save();

        return redirect()->back()->with('success', 'Verifikasi SK Belum Menikah berhasil diperbarui.');
    }

    public function generatePdf($id)
    {
        $skBelumMenikah = SK_BelumMenikah::findOrFail($id);

        // Load view dengan data SK Belum Menikah yang sesuai dengan ID
        $pdf = PDF::loadView('admin.belumMenikah.pdf', compact('skBelumMenikah'));

        // Jika Anda ingin menampilkan PDF di browser tanpa mengunduhnya, gunakan method 'stream' 
        // return $pdf->stream('sk_belum_menikah.pdf');

        // Jika Anda ingin mengunduh PDF, gunakan method 'download'
        return $pdf->download('sk_belum_menikah_' . $id . '.pdf');
    }
}
