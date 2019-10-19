<?php

use Illuminate\Support\Facades\Auth;
use App\User;
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
Route::get('/','HomeController@index')->name('home');

Auth::routes();

Route::get('/magic/{link}', function ($link) {
    $user = User::where('link',$link) -> first();

    if($user) {
        Auth::login($user);
        return view('home');
    }
    else {
        return 'Something gone wrong';
    }

});

Route::post('user/store', 'UsersController@store')->name('user/store');
Route::get('user/edit/{id}', 'UsersController@edit')->name('user/edit');
Route::post('user/update', 'UsersController@update')->name('user/update');
Route::get('user/delete/{id}', 'UsersController@destroy')->name('user/delete');

Route::get('/users', 'UsersController@index')->name('users');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('link/update', 'LinkController@edit');
Route::get('link/delete', 'LinkController@destroy');

Route::get('function/store', 'RandomNumberController@storeNumber');
Route::get('function/show', 'RandomNumberController@show');
