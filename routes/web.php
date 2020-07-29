<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::resource('ajaxpharians', 'PharianAjaxController');
Route::resource('ajaxkharians', 'KharianAjaxController');

Route::get('/laporan', 'LaporanController@index');
Route::resource('laporan', 'LaporanController');

Route::get('/laporanK', 'LaporanKController@index');
Route::resource('laporanK', 'LaporanKController');

Route::get('/laporanPK', 'LaporanPKController@index');
Route::resource('laporanPK', 'LaporanPKController');

Route::get('/tambah', 'PharianAjaxController@index');
Route::get('/ktambah', 'KharianAjaxController@index');
Route::get('/laporanuser', 'LaporanUserController@index');

