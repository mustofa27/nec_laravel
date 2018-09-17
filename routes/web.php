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

Route::get('/', 'FrontController@home');
Route::get('/daftar', 'FrontController@daftar');
Route::get('/daftar/{id_lokasi}', 'FrontController@daftarByLokasi');
Route::get('/hasil', 'FrontController@hasil');
Route::get('/pembahasan', 'FrontController@pembahasan');
Route::post('/daftar', 'FrontController@daftarkan');
Route::get('mail', function(){
  $data['title'] = 'Kirim Email';
  $data['user'] = 'dmazter';
  Mail::send('admin.ticket', $data, function($message) {
        $message->to('dmazter.mgm@gmail.com', 'dmazter')
            // ->from('notification@privilege.jawapos.co.id','Privilege Jawapos')
            ->subject('coba ticket');
    });
});
Route::get('download/{kode}', 'FrontController@downloadTiket');
// Route::get('/daftar-pengguna', 'FrontController@daftarpengguna');
Route::post('/daftar-pengguna', 'FrontController@daftarpengguna');
Route::get('pendaftaran-berhasil', 'FrontController@berhasil');
Route::get('daftar-data', 'AjaxController@daftarData');
Route::get('ajax/to/{id_lokasi}', 'AjaxController@to');
Route::get('ajax/product/{id_to}', 'AjaxController@product');
Route::get('article/{url}', 'FrontController@article');
Route::get('konfirmasi', 'FrontController@konfirmasiForm');
Route::post('konfirmasi', 'FrontController@konfirmasi');
Route::get('cek-status', 'FrontController@cekForm');
Route::post('cek-status', 'FrontController@cek');
Route::get('article', 'FrontController@all_article');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('letmein', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('letmein/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register/', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register/', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@transaksi')->name('transaksi');
Route::get('/group', 'HomeController@group')->name('group');
Route::get('/group/create', 'GroupController@create')->name('create group');
Route::post('/group/create', 'GroupController@store')->name('apc_store(key, var) group');
Route::get('/group/edit/{id}', 'GroupController@edit')->name('group.edit');
Route::post('/group/edit/{id}', 'GroupController@update')->name('group.update');
Route::get('group/destroy/{id}', 'GroupController@destroy')->name('group.destroy');
Route::get('/penginapan', 'HomeController@penginapan')->name('penginapan');
Route::post('/penginapan/create', 'PenginapanController@store')->name('apc_store(key, var) penginapan');
Route::get('/penginapan/create', 'PenginapanController@create')->name('create penginapan');
Route::get('/penginapan/edit/{id}', 'PenginapanController@edit')->name('penginapan.edit');
Route::post('/penginapan/edit/{id}', 'PenginapanController@update')->name('penginapan.update');
Route::get('penginapan/destroy/{id}', 'PenginapanController@destroy')->name('penginapan.destroy');
Route::get('/program', 'HomeController@program')->name('program');
Route::post('/program/create', 'ProgramController@store')->name('apc_store(key, var) program');
Route::get('/program/create', 'ProgramController@create')->name('create program');
Route::get('/program/edit/{id}', 'ProgramController@edit')->name('program.edit');
Route::post('/program/edit/{id}', 'ProgramController@update')->name('program.update');
Route::get('program/destroy/{id}', 'ProgramController@destroy')->name('program.destroy');
Route::get('/category', 'HomeController@category')->name('category');
Route::post('/category/create', 'CategoryController@store')->name('apc_store(key, var) category');
Route::get('/category/create', 'CategoryController@create')->name('create category');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('/category/edit/{id}', 'CategoryController@update')->name('category.update');
Route::get('category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
Route::get('/artikel', 'HomeController@artikel')->name('artikel');
Route::get('artikel/create', 'ArtikelController@create');
Route::post('artikel/create', 'ArtikelController@store');
Route::get('artikel/edit/{id}','ArtikelController@edit');
Route::post('artikel/edit/{id}','ArtikelController@update');
Route::get('artikel/destroy/{id}', 'ArtikelController@destroy');
Route::get('/galeri', 'HomeController@galeri')->name('galeri');
Route::get('galeri/create', 'GalleryController@create');
Route::post('galeri/create', 'GalleryController@store');
Route::get('galeri/edit/{id}','GalleryController@edit');
Route::post('galeri/edit/{id}','GalleryController@update');
Route::get('galeri/destroy/{id}', 'GalleryController@destroy');
Route::get('/pendaftar', 'HomeController@pendaftar')->name('pendaftar');
Route::get('transaksi/accept/{id}', 'HomeController@acceptBukti');
Route::get('transaksi/reject/{id}', 'HomeController@rejectBukti');