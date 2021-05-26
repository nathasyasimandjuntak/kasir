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

// Route::get('/','UsersController@login')->name('login');
// Route::get('/loginPost','UsersController@loginPost')->name('loginPost');
// Route::get('/admin', function(){
//   return redirect()->route('login');
// })
//
// Route::group(array('prefix'=>'admin'), function(){
//   Route::group(array('prefix'=>'customers'), function(){
//     Route::get('/','CustomersController@index')->name('customers');
//     Route::get('/create','CustomersController@create')->name('customersCreate');
//     Route::get('/edit/{id}','CustomersController@edit')->name('customerscEdit');
//     Route::post('/store','CustomersController@store')->name('customersStore');
//     Route::get('/show/{id}','CustomersController@show')->name('customersShow');
//     Route::get('/destroy/{id}','CustomersController@destroy')->name('customersDestroy');
//   });
// })




Route::get('/', 'UsersController@login')->name('login');
Route::post('/loginPost', 'UsersController@loginPost')->name('loginPost');
Route::get('/logout', 'UsersController@logout')->name('logout');
Route::get('/unduh_invoice', 'DashboardController@unduh_invoice')->name('unduh_invoice');
Route::get('/admin', function(){
  return redirect()->route('login');
});
Route::group(array('prefix'=>'admin'), function(){

  Route::group(array('prefix'=>'dashboard'), function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
  });
  Route::group(array('prefix'=>'laporan'), function(){
    Route::get('/', 'LaporanController@index')->name('laporan');
  });

  Route::group(array('prefix'=>'users'), function(){
    Route::get('/', 'UsersController@index')->name('users');
    Route::get('/create', 'UsersController@create')->name('usersCreate');
    Route::get('/edit/{id}', 'UsersController@edit')->name('usersEdit');
    Route::post('/store', 'UsersController@store')->name('usersStore');
    Route::get('/show/{id}', 'UsersController@show')->name('usersShow');
    Route::get('/destroy/{id}', 'UsersController@destroy')->name('usersDestroy');
  });

  Route::group(array('prefix'=>'customers'), function(){
    Route::get('/', 'CustomersController@index')->name('customers');
    Route::get('/create', 'CustomersController@create')->name('customersCreate');
    Route::get('/edit/{id}', 'CustomersController@edit')->name('customersEdit');
    Route::post('/store', 'CustomersController@store')->name('customersStore');
    Route::get('/show/{id}', 'CustomersController@show')->name('customersShow');
    Route::get('/destroy/{id}', 'CustomersController@destroy')->name('customersDestroy');
  });

  Route::group(array('prefix'=>'detail'), function(){
    Route::get('/', 'DetailController@index')->name('detail');
    Route::get('/create', 'DetailController@create')->name('detailCreate');
    Route::get('/edit/{id}', 'DetailController@edit')->name('detailEdit');
    Route::post('/store', 'DetailController@store')->name('detailStore');
    Route::get('/show/{id}', 'DetailController@show')->name('detailShow');
    Route::get('/destroy/{id}', 'DetailController@destroy')->name('detailDestroy');
  });

  Route::group(array('prefix'=>'paket'), function(){
    Route::get('/', 'PaketController@index')->name('paket');
    Route::get('/create', 'PaketController@create')->name('paketCreate');
    Route::get('/edit/{id}', 'PaketController@edit')->name('paketEdit');
    Route::post('/store', 'PaketController@store')->name('paketStore');
    Route::get('/show/{id}', 'PaketController@show')->name('paketShow');
    Route::get('/destroy/{id}', 'PaketController@destroy')->name('paketDestroy');
  });

  Route::group(array('prefix'=>'transaksi'), function(){
    Route::get('/', 'TransaksiController@index')->name('transaksi');
    Route::get('/create', 'TransaksiController@create')->name('transaksiCreate');
    Route::get('/edit/{id}', 'TransaksiController@edit')->name('transaksiEdit');
    Route::post('/store', 'TransaksiController@store')->name('transaksiStore');
    Route::get('/show/{id}', 'TransaksiController@show')->name('transaksiShow');
    Route::get('/destroy/{id}', 'TransaksiController@destroy')->name('transaksiDestroy');
  });

});
