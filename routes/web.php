<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/datapendonor','DataPendonorController@data');
Route::post('/datapendonor','DataPendonorController@input');
Route::get('/datapendonor/{id}/edit','DataPendonorController@edit');
Route::post('/datapendonor/update','DataPendonorController@update');
Route::delete('/datapendonor/{id}/edit','DataPendonorController@delete');
Route::get('/cetak-donor','DataPendonorController@cetak');
Route::get('/Laporan/{tglawal}/{tglakhir}', 'DataPendonorController@cetakpertanggal')->name('good');

Route::get('/confirmed', function () {
    return 'password confirmed';
})->middleware(['auth', 'password.confirm']);

Route::get('/verified', function () {
    return 'email verified';
})->middleware('verified');



// Route::get('/datapendonor', function (){
//     return view('pegawai.datapendonor');
// });

Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Auth::routes(['verify' => true]);
    Route::get('/daftarkaryawan','KelolaKaryawan@data');
    Route::get('/daftarkaryawan/data','KelolaKaryawan@json');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    
    Route::get('/mobil', 'mobilController@show');
    Route::post('/mobil/tambah', 'mobilController@store');
    Route::get('/mobil/{id}/edit','mobilController@edit');
    Route::post('/mobil/update','mobilController@update');
    Route::delete('/mobil/{id}/hapus','mobilController@destroy');

    Route::get('/barang', 'barangController@show');
    Route::post('/barang/tambah', 'barangController@store');
    Route::get('/barang/{id}/edit','barangController@edit');
    Route::post('/barang/update','barangController@update');
    Route::delete('/barang/{id}/hapus','barangController@destroy');

    Route::get('/jadwal', 'jadwalController@show');
    Route::post('/jadwal/tambah','jadwalController@tambah');
    Route::post('/jadwal/update','jadwalController@update');
    Route::get('/cetak-jadwal', 'jadwalController@cetak');
    Route::get('/cetak/pertanggal/{tglawal}/{tglakhir}', 'jadwalController@cetakpertanggal')->name('cetak-jadwal-pertanggal');
    Route::delete('/jadwal/{id}/hapus','jadwalController@destroy');

    Route::get('/confirmed', function () {
        return 'password confirmed';
    })->middleware(['auth:admin-web', 'password.confirm:admin.password.confirm']);
    
    Route::get('/verified', function () {
        return 'email verified';
    })->middleware('verified:admin.verification.notice,admin-web');

});
