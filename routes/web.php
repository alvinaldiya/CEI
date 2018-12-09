<?php

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
use Illuminate\Support\Facades\Redirect;
use Ixudra\Curl\Facades\Curl;

Auth::routes();

// ROUTE DEFAULT
//END ROUTE DEFAULT

//AUTHENTICATION USER

//ROUTE PREFIX LOGIN
Route::prefix('login')->group(function () {

    //cek data G+
    Route::get('google', 'Auth\LoginController@redirectToProvider');

    //Callack data G+
    Route::get('google/callback', 'Auth\LoginController@handleProviderCallback');
});
//END ROUTE PREFIX LOGIN

Route::get('/logout', function () {
    Auth::logout();
    return Redirect::to('login');
});

//END AUTHENTICATION USER

//ROUTE HOME
Route::prefix('home')->group(function () {

    Route::get('/', 'HomeController@index');
    Route::get('/', 'UserController@getJumlahUsers');

   

});


   




//END ROUTE HOME

//ROUTE ACARA
Route::prefix('acara')->group(function () {

    Route::get('/', 'AcaraController@index');

    //GET DATA MASTER ACARA
    Route::get('getMasterAcaraDatatables', 'AcaraController@getMasterAcaraDatatables');
    Route::get('getMasterAcaraAutoComplete', 'AcaraController@getMasterAcaraAutoComplete');
    Route::get('getListMasterAcara', 'AcaraController@getListMasterAcara');

    //CRUD PROSES
    Route::post('masterAcara/save', 'AcaraController@saveMasterAcara');
    Route::get('masterAcara/detail/{id}', 'AcaraController@getDetailMasterAcara');
    Route::post('masterAcara/update/{id}', 'AcaraController@updateMasterAcara');
    Route::post('masterAcara/delete/{id}', 'AcaraController@deleteMasterAcara');
    //END CRUD PROSES
});
//END ROUTE ACARA

//ROUTE KEGIATAN
Route::prefix('kegiatan')->group(function () {

    //GET DATA LIST KEGIATAN DATATABLES
    Route::get('getKegiatanDatatables', 'KegiatanController@getKegiatanDatatables');

    Route::get('getKegiatanAliasAutoComplete', 'KegiatanController@getKegiatanAliasAutoComplete');

    Route::get('detail/{id}', 'KegiatanController@detail');

    //CRUD PROSES
    Route::post('save', 'KegiatanController@save');
    Route::post('update/{id}', 'KegiatanController@update');
    //END CRUD PROSES
});
//END ROUTE KEGIATAN

//ROUTE PESERTA
Route::prefix('peserta')->group(function () {

    Route::get('/', 'PesertaController@index');

    //GET DATA NIM FROM WEBSERVICES
    Route::get('getNimRapi/{nim}', 'PesertaController@getNimRapi');

    //GET DATA PESERTA DATATABLES
    Route::get('getPesertaDatatables', 'PesertaController@getPesertaDatatables');

    //GET DATA PESERTA
    Route::get('getDetailPeserta/{id}', 'PesertaController@getDetailPeserta');
    Route::post('getListPesertaByKegiatan', 'PesertaController@getListPesertaByKegiatan');

    //CRUD PROSES
    Route::post('tambahPeserta', 'PesertaController@tambahPeserta');
    Route::post('updatePeserta/{id}', 'PesertaController@updatePeserta');
    Route::post('hapusPeserta/{id}', 'PesertaController@hapusPeserta');
    //END CRUD PROSES

});
//END ROUTE PESERTA

//ROUTE GRADEBOOK
Route::prefix('gradebook')->group(function () {
    Route::get('/', 'GradebookController@index');

    //CRUD
    Route::post('updateGradebook', 'GradebookController@updateGradebook');
});
//END ROUTE GRADEBOOK

//ROUTE PESERTA
Route::prefix('master')->group(function () {

    //GET DATA DOSEN FROM RAPI
    Route::get('getDataDosen', 'MasterController@getDataDosen');

    //GET DATA MHS FROM RAPI
    Route::get('getDataMhs/{nim}', 'MasterController@getDataMhs');

});
//END ROUTE PESERTA

//ROUTE SERTIFIKAT
Route::prefix('sertifikat')->group(function () {

    Route::get('/', 'SertifikatController@index');


    //GET DATA PESERTA DATATABLES
    Route::get('getSertifikatDatatables', 'SertifikatController@getSertifikatDatatables');
    //GET DATA MASTER SERTIFIKAT DATATABLES
    Route::post('getMasterSertifikatDatatables', 'SertifikatController@getMasterSertifikatDatatables');

    Route::get('cetak/{id_peserta}/{bg}', 'SertifikatController@cetak');
    Route::get('daftarhadir/{id_kegiatan}', 'SertifikatController@daftarHadir');

    Route::get('blanko/delete/{blanko}', 'SertifikatController@deleteBlanko');
    Route::get('preview/blanko/{blanko}', 'SertifikatController@previewBlanko');

    Route::get('filee', 'SertifikatController@filee');
    Route::post('tambahBlanko', 'SertifikatController@tambahBlanko');
    Route::post('add-catagory', 'SertifikatController@catadd');

    Route::post('inputNoSertifikat', 'SertifikatController@inputNoSertifikat');

});
//END ROUTE SERTIFIKAT

//ROUTE PREFIX VERIFY
Route::prefix('verify')->group(function () {

    Route::get('/', 'VerifyController@show');

    Route::get('nourut', 'VerifyController@nourut');

    Route::get('verifSertifikat', 'VerifyController@verifSertifikat');

    Route::get('cekSertifikat', 'VerifyController@cekSertifikat');

});
//END ROUTE PREFIX VERIFY

//VERIFY ACCOUNT
Route::get('user/verify/{token}', 'Auth\RegisterController@verifyUser');
//END VERIFY ACCOUNT


