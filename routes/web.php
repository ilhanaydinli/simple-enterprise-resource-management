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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {

    Route::get('uretim', 'Uretim\UretimController@urunUretGet');
    Route::post('uretim', 'Uretim\UretimController@urunUretPost');
    Route::get('uretim/uretim', 'Uretim\UretimController@urunUretGet');
    Route::post('uretim/uretim', 'Uretim\UretimController@urunUretPost');
    Route::get('uretim/uretilenler', 'Uretim\UretimController@urunUretilenlerGet');
    Route::get('uretim/sil/{uretilen}', 'Uretim\UretimController@urunUretilenSilGet');
    Route::get('uretim/ayrintilar/{uretilen}', 'Uretim\UretimController@urunAyrintilarGet');

    Route::get('uretim/hammadde', 'Uretim\HammaddeController@urunHammaddeGet');
    Route::get('uretim/hammadde-ekle', 'Uretim\HammaddeController@urunHammaddeEkleGet');
    Route::post('uretim/hammadde-ekle', 'Uretim\HammaddeController@urunHammaddeEklePost');
    Route::get('uretim/hammadde-duzenle/{hammadde}', 'Uretim\HammaddeController@urunHammaddeDuzenleGet');
    Route::post('uretim/hammadde-duzenle/{hammadde}', 'Uretim\HammaddeController@urunHammaddeDuzenlePost');
    Route::get('uretim/hammadde-sil/{hammadde}', 'Uretim\HammaddeController@urunHammaddeSilGet');


    Route::get('uretim/urunler', 'Uretim\UrunController@urunlerGet');
    Route::get('uretim/urun-ekle', 'Uretim\UrunController@urunEkleGet');
    Route::post('uretim/urun-ekle', 'Uretim\UrunController@urunEklePost');
    Route::get('uretim/urun-duzenle/{urun}', 'Uretim\UrunController@urunDuzenleGet');
    Route::post('uretim/urun-duzenle/{urun}', 'Uretim\UrunController@urunDuzenlePost');
    Route::get('uretim/urun-sil/{urun}', 'Uretim\UrunController@urunSilGet');


    Route::get('iky', 'IKY\IKYController@iscilerGet');
    Route::get('iky/isciler', 'IKY\IKYController@iscilerGet');
    Route::get('iky/isci-ekle', 'IKY\IKYController@isciEkleGet');
    Route::post('iky/isci-ekle', 'IKY\IKYController@isciEklePost');
    Route::get('iky/isci-duzenle/{isci}', 'IKY\IKYController@isciDuzenleGet');
    Route::post('iky/isci-duzenle/{isci}', 'IKY\IKYController@isciDuzenlePost');
    Route::get('iky/isci-sil/{isci}', 'IKY\IKYController@isciSilGet');



    Route::get('finans/finans', 'Finans\FinansController@finansGet');
    Route::get('finans/aylik', 'Finans\FinansController@aylikGet');
});
