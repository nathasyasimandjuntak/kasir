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

// Route::get('/', function () {
//     return view('welcome')->dashboard;
// });

// Route::get('/', function(){ return redirect()->route('login'); });
Route::group(array('/','prefix'=>'admin'), function(){



  //////////////////////// ROUTE DASHPBOARD ////////////////////////
  Route::group(array('prefix'=>'dashboard'), function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
  });
//////////////////////// ROUTE BARANG ////////////////////////
  Route::group(array('prefix'=>'barang'), function(){
    Route::get('/', 'BarangController@index')->name('barang');
    Route::post('/datagrid', 'BarangController@datagrid')->name('barangDatagrid');
    Route::get('/create', 'BarangController@create')->name('barangCreate');
    Route::get('/show/rq?={id}', 'BarangController@show')->name('barangShow');
    Route::post('/store', 'BarangController@store')->name('barangStore');
    Route::post('/destroy', 'BarangController@destroy')->name('barangDestroy');
    Route::get('/{edit}/{id}', 'BarangController@create')->name('barangEdit');
  });

  //////////////////////// ROUTE TRANSAKSI ////////////////////////
    Route::group(array('prefix'=>'transaksi'), function(){
      Route::get('/', 'TransaksiController@index')->name('transaksi');
      Route::post('/datagrid', 'TransaksiController@datagrid')->name('transaksiDatagrid');
      Route::get('/create', 'TransaksiController@create')->name('transaksiCreate');
      Route::post('/show', 'TransaksiController@show')->name('transaksiShow');
      Route::post('/store', 'TransaksiController@store')->name('transaksiStore');
      Route::post('/destroy', 'TransaksiController@destroy')->name('transaksiDestroy');
      Route::get('/{edit}/{id}', 'TransaksiController@create')->name('transaksiEdit');
    });

    //////////////////////// ROUTE PEGAWAI ////////////////////////
      Route::group(array('prefix'=>'pegawai'), function(){
        Route::get('/', 'PegawaiController@index')->name('pegawai');
        Route::post('/datagrid', 'PegawaiController@datagrid')->name('pegawaiDatagrid');
        Route::get('/create', 'PegawaiController@create')->name('pegawaiCreate');
        Route::post('/show', 'PegawaiController@show')->name('pegawaiShow');
        Route::post('/store', 'PegawaiController@store')->name('pegawaiStore');
        Route::post('/destroy', 'PegawaiController@destroy')->name('pegawaiDestroy');
        Route::get('/{edit}/{id}', 'PegawaiController@create')->name('pegawaiEdit');
      });

      //////////////////////// ROUTE BARANG TRANSAKSI ////////////////////////
        Route::group(array('prefix'=>'barangTransaksi'), function(){
          Route::get('/', 'barangTransaksiController@index')->name('barangTransaksi');
          Route::post('/datagrid', 'barangTransaksiController@datagrid')->name('barangTransaksiDatagrid');
          Route::get('/create', 'barangTransaksiController@create')->name('barangTransaksiCreate');
          Route::post('/show', 'barangTransaksiController@show')->name('barangTransaksiShow');
          Route::post('/store', 'barangTransaksiController@store')->name('barangTransaksiStore');
          Route::post('/destroy', 'barangTransaksiController@destroy')->name('barangTransaksiDestroy');
          Route::get('/{edit}/{id}', 'barangTransaksiController@create')->name('barangTransaksiEdit');
        });

        //////////////////////// ROUTE USERS ////////////////////////
          Route::group(array('prefix'=>'users'), function(){
            Route::get('/', 'UsersController@index')->name('users');
            Route::post('/datagrid', 'UsersController@datagrid')->name('usersDatagrid');
            Route::get('/create', 'UsersController@create')->name('usersCreate');
            Route::post('/show', 'UsersController@show')->name('usersShow');
            Route::post('/store', 'UsersController@store')->name('usersStore');
            Route::post('/destroy', 'UsersController@destroy')->name('usersDestroy');
            Route::get('/{edit}/{id}', 'UsersController@create')->name('usersEdit');
          });

});
