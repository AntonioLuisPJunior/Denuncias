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

Route::get('/', 'DenunciaController@index')->name('denuncia.index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/denuncia')->group(function () {
    Route::get('/create', 'DenunciaController@create')->name('denuncia.create');
    Route::post('/store', 'DenunciaController@store')->name('denuncia.store');
    Route::get('/show/{denuncia}', 'DenunciaController@show')->name('denuncia.show');
    Route::get('/edit/{denuncia}', 'DenunciaController@edit')->name('denuncia.edit');
    Route::put('/update/{denuncia}', 'DenunciaController@update')->name('denuncia.update');
    Route::delete('/delete/{denuncia}', 'DenunciaController@delete')->name('denuncia.delete');
});