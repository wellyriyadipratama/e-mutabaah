<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MutabaahController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\TahunAjaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/login',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);

Route::get('/',[LandingpageController::class,'index']);

Route::group(['middleware'=>'admin'],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard']);

    Route::group(['prefix'=>'mutabaah'],function(){
        Route::get('/lihat',[MutabaahController::class,'index']);
        Route::get('/tambah',[MutabaahController::class,'tambah'])->name('tambah-mutabaah');
        Route::get('/detail/{id}',[MutabaahController::class,'lihatMutabaah'])->name('lihat-mutabaah'); 
        Route::get('/nilai/santri/{kelas_id}/{santri_id}',[MutabaahController::class,'nilaiMutabaah'])->name('nilai-mutabaah'); 
        Route::post('/simpan',[MutabaahController::class,'simpanMutabaah'])->name('simpan-mutabaah');
        Route::get('/delete/{id}',[MutabaahController::class,'deleteMutabaah'])->name('delete-mutabaah');
    });

    Route::group(['prefix'=>'nilai'],function(){
        Route::get('/lihat',[NilaiController::class,'lihat']);
        Route::get('/tambah',[NilaiController::class,'tambah'])->name('tambah-nilai');
        Route::get('/detail/{id}',[NilaiController::class,'lihatNilai'])->name('lihat-nilai'); 
        Route::get('/nilai/tahfizh/santri/{kelas_id}/{santri_id}',[NilaiController::class,'nilaiTahfizh'])->name('nilai-tahfizh'); 
        Route::get('/nilai/tahsin/santri/{kelas_id}/{santri_id}',[NilaiController::class,'nilaiTahsin'])->name('nilai-tahsin'); 
        Route::post('/simpan',[NilaiController::class,'simpanNilai'])->name('simpan-nilai');
        Route::get('/delete/{id}',[NilaiController::class,'deleteNilai'])->name('delete-nilai');
    });

    Route::group(['prefix'=>'summary-nilai'],function(){
        Route::get('/lihat',[NilaiController::class,'summaryNilai']);
        Route::get('/kalkulasi',[NilaiController::class,'calculateNilai'])->name('kalkulasi-summary-nilai');
        Route::get('/print/{id}',[NilaiController::class,'cetakNilai'])->name('cetak-summary-nilai');
        Route::get('/detail/{id}',[NilaiController::class,'detailSummaryNilai'])->name('detail-summary-nilai');
        Route::get('/print',[NilaiController::class,'cetakNilai'])->name('cetak-all-summary-nilai');
        Route::get('/tambah',[NilaiController::class,'calculateNilai'])->name('tambah-summary-nilai');
        Route::post('/update',[NilaiController::class,'updateMasterNilai'])->name('update-summary-nilai');
    });

    Route::group(['prefix'=>'santri'],function(){
        Route::get('/lihat',[NilaiController::class,'lihat']);
        Route::get('/tambah',[NilaiController::class,'tambah'])->name('tambah-santri');
    });

    Route::group(['prefix'=>'santri'],function(){
        Route::get('/lihat',[SantriController::class,'lihat']);
        Route::post('/simpan',[SantriController::class,'simpanSantri'])->name('simpan-santri');
        Route::post('/update',[SantriController::class,'updateSantri'])->name('update-santri');
        Route::get('/edit/{id}',[SantriController::class,'editSantri'])->name('edit-santri');
        Route::get('/delete/{id}',[SantriController::class,'deleteSantri'])->name('delete-santri');
    });

    Route::group(['prefix'=>'guru'],function(){
        Route::get('/lihat',[GuruController::class,'lihat']);
        Route::post('/simpan',[GuruController::class,'simpanGuru'])->name('simpan-guru');
        Route::post('/update',[GuruController::class,'updateGuru'])->name('update-guru');
        Route::get('/edit/{id}',[GuruController::class,'editGuru'])->name('edit-guru');
        Route::get('/delete/{id}',[GuruController::class,'deleteGuru'])->name('delete-guru');
    });

    Route::group(['prefix'=>'tahunajaran'],function(){
        Route::get('/lihat',[TahunAjaranController::class,'lihat']);
        Route::post('/simpan',[TahunAjaranController::class,'simpanTahunAjaran'])->name('simpan-tahunajaran');
        Route::post('/update',[TahunAjaranController::class,'updateTahunAjaran'])->name('update-tahunajaran');
        Route::get('/edit/{id}',[TahunAjaranController::class,'editTahunAjaran'])->name('edit-tahunajaran');
        Route::get('/delete/{id}',[TahunAjaranController::class,'deleteTahunAjaran'])->name('delete-tahunajaran');
    });

    Route::group(['prefix'=>'kelas'],function(){
        Route::get('/lihat',[KelasController::class,'lihat']);
        Route::post('/simpan',[KelasController::class,'simpanKelas'])->name('simpan-kelas');
        Route::post('/update',[KelasController::class,'updateKelas'])->name('update-kelas');
        Route::get('/edit/{id}',[KelasController::class,'editKelas'])->name('edit-kelas');
        Route::get('/delete/{id}',[KelasController::class,'deleteKelas'])->name('delete-kelas');
        Route::get('/detail/{id}',[KelasController::class,'detailKelas'])->name('detail-kelas');
        Route::get('/simpan/guru',[KelasController::class,'simpanGuru'])->name('simpan-guru-kelas');
        Route::get('/simpan/santri',[KelasController::class,'simpanSantri'])->name('simpan-santri-kelas');
        Route::get('/delete/santri/{id}',[KelasController::class,'deleteSantri'])->name('delete-santri-kelas');
        Route::get('/delete/guru/{id}',[KelasController::class,'deleteGuru'])->name('delete-guru-kelas');
    });

    Route::group(['prefix'=>'mapel'],function(){
        Route::get('/lihat',[MapelController::class,'lihat']);
        Route::post('/simpan',[MapelController::class,'simpanMapel'])->name('simpan-mapel');
        Route::post('/update',[MapelController::class,'updateMapel'])->name('update-mapel');
        Route::get('/edit/{id}',[MapelController::class,'editMapel'])->name('edit-mapel');
        Route::get('/delete/{id}',[MapelController::class,'deleteMapel'])->name('delete-mapel');
    });

    Route::group(['prefix'=>'informasi'],function(){
        Route::get('/lihat',[InformasiController::class,'lihat']);
        Route::post('/simpan',[InformasiController::class,'simpanInformasi'])->name('simpan-informasi');
        Route::post('/update',[InformasiController::class,'updateInformasi'])->name('update-informasi');
        Route::get('/edit/{id}',[InformasiController::class,'editInformasi'])->name('edit-informasi');
        Route::get('/delete/{id}',[InformasiController::class,'deleteInformasi'])->name('delete-informasi');
    });
});