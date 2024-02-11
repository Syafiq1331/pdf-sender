<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SK_KeteranganAhliWaris;
use Illuminate\Http\Request;
use PDF;

class KeteranganAhliWarisController extends Controller
{
    public function index()
    {
        $keteranganAhliWaris = SK_KeteranganAhliWaris::where(function ($query) {
            $query->where('verifikasi', 'belum-verifikasi')
                ->orWhere('status', 'pending');
        })
            ->orWhere(function ($query) {
                $query->where('verifikasi', 'ter-verifikasi')
                    ->where('status', 'ditolak');
            })
            ->get();
        return view('admin.keteranganAhliWaris.index', compact('keteranganAhliWaris'));
    }

    public function envelopeOut()
    {
        $keteranganAhliWaris = SK_KeteranganAhliWaris::where('verifikasi', 'ter-verifikasi')
            ->where('status', 'ter-acc')
            ->get();
        return view('admin.keteranganAhliWaris.outEnvelope', compact('keteranganAhliWaris'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:ter-acc,pending,ditolak',
        ]);

        $skBelumMenikah = SK_KeteranganAhliWaris::findOrFail($id);
        $skBelumMenikah->status = $request->status;
        $skBelumMenikah->save();

        return redirect()->back()->with('success', 'Status SK Belum Menikah berhasil diperbarui.');
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'verifikasi' => 'required|in:ter-verifikasi,belum-verifikasi',
        ]);

        $skBelumMenikah = SK_KeteranganAhliWaris::findOrFail($id);
        $skBelumMenikah->verifikasi = $request->verifikasi;
        $skBelumMenikah->save();

        return redirect()->back()->with('success', 'Verifikasi SK Belum Menikah berhasil diperbarui.');
    }

    public function generatePdf($id)
    {
        $skBelumMenikah = SK_KeteranganAhliWaris::findOrFail($id);

        // Load view dengan data SK Belum Menikah yang sesuai dengan ID
        $pdf = PDF::loadView('admin.belumMenikah.pdf', compact('skBelumMenikah'));

        // Jika Anda ingin menampilkan PDF di browser tanpa mengunduhnya, gunakan method 'stream' 
        // return $pdf->stream('sk_belum_menikah.pdf');

        // Jika Anda ingin mengunduh PDF, gunakan method 'download'
        return $pdf->download('sk_belum_menikah_' . $id . '.pdf');
    }
}
