<?php
Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();
Route::group(['middleware'=>['auth','ceklevel:admin']], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
    Route::resource('/customer', 'CustomerController');
    Route::resource('/paket', 'PaketController');
    Route::get('/upload/paket/excel', 'PaketController@excel')->name('paket.excel');
    Route::post('/upload/paket/excel', 'PaketController@upload')->name('paket.upload.excel');
    Route::resource('detailpaket', 'DetailPaketController');
    Route::get('/transaksi/pemesanan', 'TransaksiController@index')->name('transaksi.index');
    Route::post('/transaksi/pemesanan', 'TransaksiController@store')->name('transaksi.store');
    Route::delete('transaksi/{id}', 'TransaksiController@destroy')->name('transaksi.destroy');
    Route::get('/transaksi/update', 'TransaksiController@update')->name('transaksi.update');
    Route::get('/transaksi/pdf', 'TransaksiController@laporan')->name('transaksi.laporan');
    Route::get('/transaksi/excel', 'TransaksiController@excel')->name('laporan.excel');
    Route::get('/transaksi/pembayaran', 'TransaksiController@bayar')->name('transaksi.bayar');
    Route::get('/upload/pembayaran', 'TransaksiController@uploadbukti')->name('transaksi.upload');
    Route::post('/upload/pembayaran', 'TransaksiController@upload')->name('transaksi.upload.bukti');
    Route::get('/upload/pelunasan', 'TransaksiController@uploadpelunasan')->name('transaksi.pelunasan');
    Route::post('/upload/pelunasan', 'TransaksiController@pelunasan')->name('transaksi.upload.pelunasan');
});
Route::group(['middleware'=>['auth','ceklevel:user,admin']], function () {
    Route::get('/dashboard', 'PaketController@list')->name('paket.list');
    Route::get('/transaksi/pemesanan', 'TransaksiController@index')->name('transaksi.index');
    Route::post('/transaksi/pemesanan', 'TransaksiController@store')->name('transaksi.store');
    Route::delete('/transaksi/{id}', 'TransaksiController@destroy')->name('transaksi.destroy');
    Route::get('/transaksi/update', 'TransaksiController@update')->name('transaksi.update');
    Route::get('/transaksi/pembayaran', 'TransaksiController@bayar')->name('transaksi.bayar');
    Route::get('/transaksi/pembayaran', 'TransaksiController@bayar')->name('transaksi.bayar');
    Route::get('/upload/pembayaran', 'TransaksiController@uploadbukti')->name('transaksi.upload');
    Route::post('/upload/pembayaran', 'TransaksiController@upload')->name('transaksi.upload.bukti');
    Route::get('/upload/pelunasan', 'TransaksiController@uploadpelunasan')->name('transaksi.pelunasan');
    Route::post('/upload/pelunasan', 'TransaksiController@pelunasan')->name('transaksi.upload.pelunasan');
});