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

// use App\Http\Controllers\AdminController;
// use App\Providers\RouteServiceProvider;

use App\Http\Resources\MessageResource;
use App\Message;
use App\UserMessage;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::get('/mahasiswa', 'MahasiswaController@index');
Route::post('/mahasiswa/create', 'MahasiswaController@create');
Route::get('/mahasiswa/{id}/edit', 'MahasiswaController@edit');
Route::post('/mahasiswa/{id}/update', 'MahasiswaController@update');
Route::get('/mahasiswa/{id}/delete', 'MahasiswaController@delete');

Route::group(['middleware' => ['auth', 'RoleCheck:admin,mahasiswa,dosen']], function(){
    Route::get('/dashboard', 'DashboardController@index');
});

Route::get('/dosen', 'DosenController@index');
Route::post('/dosen/create', 'DosenController@create');
Route::get('/dosen/{id}/edit', 'DosenController@edit');
Route::post('/dosen/{id}/update', 'DosenController@update');
Route::get('/dosen/{id}/delete', 'DosenController@delete');


Route::group(['middleware' => ['auth', 'RoleCheck:admin']], function () {
    Route::get('/admin', 'AdminController@index');
    Route::post('/admin/create', 'AdminController@create');
    Route::get('/admin/{id}/edit', 'AdminController@edit');
    Route::post('/admin/{id}/update', 'AdminController@update');
    Route::get('/admin/{id}/delete', 'AdminController@delete');
});

Route::get('/admin/{id}/profile', 'ProfileController@AdminProfile');
Route::get('/mahasiswa/{id}/profile', 'ProfileController@MahasiswaProfile');
Route::get('/dosen/{id}/profile', 'DosenController@DosenProfile');


Route::get('/bimbingan', 'BimbinganController@index');
Route::post('/bimbingan', 'BimbinganController@upload');
Route::get('/bimbingan/dosen', 'BimbinganController@dosen');
Route::get('/bimbingan/{id}/delete', 'BimbinganController@delete');

Route::get('/messages', 'ChatController@index');
// Messages
Route::group(['prefix' => 'api', 'middleware' => 'auth'], function() {
    Route::resource('messages', 'MessageController');
    Route::get('user/{search}', function($search) {
        return \App\User::where('name', 'like', "%{$search}%")->get();
    });
});
