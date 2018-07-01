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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register',function(){
    return view('register');
})->name('register');

Route::post('/registerClient','LoginController@registerClient')->name('registerClient');
Route::post('/loginClient','LoginController@loginClient')->name('loginClient');
Route::get('/logout','LoginController@logOut')->name('logout');

/*
@ Client Routes
@ Protected By Middleware #ClientWare
*/
Route::group(['prefix'=>'client', 'middleware'=> 'ClientWare'],function(){
    Route::get('/','ClientController@index')->name('client');
    Route::get('/forms','ClientController@submittedForms')->name('forms');
});

