<?php
Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();
Route::group(['middleware'=>'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
    Route::resource('kategori', 'KategoriController');
    Route::get('/upload/kategori/excel', 'KategoriController@excel')->name('kategori.excel');
    Route::post('/upload/kategori/excel', 'KategoriController@upload')->name('kategori.upload.excel');
    Route::resource('paket', 'PaketController');
    Route::get('transaksi', 'TransaksiController@index')->name('transaksi.index');
    Route::post('transaksi', 'TransaksiController@store')->name('transaksi.store');
    Route::delete('transaksi/{id}', 'TransaksiController@destroy')->name('transaksi.destroy');
    Route::get('transaksi/update', 'TransaksiController@update')->name('transaksi.update');
    Route::get('transaksi/pdf', 'TransaksiController@laporan')->name('transaksi.laporan');
    Route::get('/excel', 'TransaksiController@excel')->name('laporan.excel');
});