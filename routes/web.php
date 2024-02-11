<?php

use App\Http\Controllers\admin\BelumMenikahController;
use App\Http\Controllers\admin\DashboardControler;
use App\Http\Controllers\admin\JualBeliController;
use App\Http\Controllers\admin\KelakuanBaikController;
use App\Http\Controllers\admin\KematianController;
use App\Http\Controllers\admin\KeteranganAhliWarisController;
use App\Http\Controllers\admin\KeteranganUsahaController;
use App\Http\Controllers\admin\TidakMampuController;
use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    redirect('/login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('store');

Route::get('/surat-keterangan-belum-menikah', [BelumMenikahController::class, 'getDataFromUser'])->name('getDataFromUser');
Route::post('/surat-keterangan-belum-menikah', [BelumMenikahController::class, 'storeDataFromUser'])->name('storeDataFromUser');

Route::get('/surat-keterangan-tidak-mampu', [TidakMampuController::class, 'getDataFromUser'])->name('getDataFromUser');
Route::post('/surat-keterangan-tidak-mampu', [TidakMampuController::class, 'storeDataFromUser'])->name('storeDataFromUser');

Route::get('/surat-keterangan-kelakuan-baik', [KelakuanBaikController::class, 'getDataFromUser'])->name('getDataFromUser');
Route::post('/surat-keterangan-kelakuan-baik', [KelakuanBaikController::class, 'storeDataFromUser'])->name('storeDataFromUser');

Route::get('/surat-keterangan-usaha', [KeteranganUsahaController::class, 'getDataFromUser'])->name('getDataFromUser');
Route::post('/surat-keterangan-usaha', [KeteranganUsahaController::class, 'storeDataFromUser'])->name('storeDataFromUser');

Route::prefix('admin')->group(function () {
    Route::resource('dashboard', DashboardControler::class);

    Route::prefix('surat-keterangan-belum-menikah')->group(function () {
        Route::resource('/', BelumMenikahController::class);
        Route::put('/{id}/update-status', [BelumMenikahController::class, 'updateStatus'])->name('surat-keterangan-belum-menikah.update_status');
        Route::put('/{id}/update-verifikasi', [BelumMenikahController::class, 'updateVerifikasi'])->name('surat-keterangan-belum-menikah.update_verifikasi');
        Route::get('/{id}/generate-pdf', [BelumMenikahController::class, 'generatePdf'])->name('surat-keterangan-belum-menikah.generate_pdf_single');
        Route::get('/out-envelope', [BelumMenikahController::class, 'envelopeOut']);
    });

    Route::prefix('surat-keterangan-tidak-mampu')->group(function () {
        Route::resource('/', TidakMampuController::class);
        Route::put('/{id}/update-status', [TidakMampuController::class, 'updateStatus'])->name('surat-keterangan-tidak-mampu.update_status');
        Route::put('/{id}/update-verifikasi', [TidakMampuController::class, 'updateVerifikasi'])->name('surat-keterangan-tidak-mampu.update_verifikasi');
        Route::get('/{id}/generate-pdf', [TidakMampuController::class, 'generatePdf'])->name('surat-keterangan-tidak-mampu.generate_pdf_single');
        Route::get('/out-envelope', [TidakMampuController::class, 'envelopeOut']);
    });

    Route::prefix('surat-keterangan-kelakuan-baik')->group(function () {
        Route::resource('/', KelakuanBaikController::class);
        Route::put('/{id}/update-status', [KelakuanBaikController::class, 'updateStatus'])->name('surat-keterangan-kelakuan-baik.update_status');
        Route::put('/{id}/update-verifikasi', [KelakuanBaikController::class, 'updateVerifikasi'])->name('surat-keterangan-kelakuan-baik.update_verifikasi');
        Route::get('/{id}/generate-pdf', [KelakuanBaikController::class, 'generatePdf'])->name('surat-keterangan-kelakuan-baik.generate_pdf_single');
        Route::get('/out-envelope', [KelakuanBaikController::class, 'envelopeOut']);
    });

    Route::prefix('surat-keterangan-usaha')->group(function () {
        Route::resource('/', KeteranganUsahaController::class);
        Route::put('/{id}/update-status', [KeteranganUsahaController::class, 'updateStatus'])->name('surat-keterangan-usaha.update_status');
        Route::put('/{id}/update-verifikasi', [KeteranganUsahaController::class, 'updateVerifikasi'])->name('surat-keterangan-usaha.update_verifikasi');
        Route::get('/{id}/generate-pdf', [KeteranganUsahaController::class, 'generatePdf'])->name('surat-keterangan-usaha.generate_pdf_single');
        Route::get('/out-envelope', [KeteranganUsahaController::class, 'envelopeOut']);
    });

    Route::prefix('surat-keterangan-kematian')->group(function () {
        Route::resource('/', KematianController::class);
        Route::put('/{id}/update-status', [KematianController::class, 'updateStatus'])->name('surat-keterangan-kematian.update_status');
        Route::put('/{id}/update-verifikasi', [KematianController::class, 'updateVerifikasi'])->name('surat-keterangan-kematian.update_verifikasi');
        Route::get('/{id}/generate-pdf', [KematianController::class, 'generatePdf'])->name('surat-keterangan-kematian.generate_pdf_single');
        Route::get('/out-envelope', [KematianController::class, 'envelopeOut']);
    });

    Route::resource('surat-keterangan-jual-beli', JualBeliController::class);

    Route::prefix('surat-keterangan-ahli-waris')->group(function () {
        Route::resource('/', KeteranganAhliWarisController::class);
        Route::put('/{id}/update-status', [KeteranganAhliWarisController::class, 'updateStatus'])->name('surat-keterangan-ahli-waris.update_status');
        Route::put('/{id}/update-verifikasi', [KeteranganAhliWarisController::class, 'updateVerifikasi'])->name('surat-keterangan-ahli-waris.update_verifikasi');
        Route::get('/{id}/generate-pdf', [KeteranganAhliWarisController::class, 'generatePdf'])->name('surat-keterangan-ahli-waris.generate_pdf_single');
        Route::get('/out-envelope', [KeteranganAhliWarisController::class, 'envelopeOut']);
    });
});
