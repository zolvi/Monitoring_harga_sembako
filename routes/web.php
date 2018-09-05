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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin','middleware'=>['admin','auth']],function(){
 		Route::get('/',function( ){return view('home');});
		Route::resource('jenis', 'JenisController');
		Route::resource('kategori', 'KategoriController');
		Route::resource('pasar', 'PasarController');
		Route::resource('komoditas', 'KomoditasController');
		Route::get('/json-kategori','KomoditasController@kateg');
		Route::get('/json-jenis','KomoditasController@jenis');
		Route::resource('harga', 'HargaController');
		Route::post('addHarga','HargaController@addHarga');
	});