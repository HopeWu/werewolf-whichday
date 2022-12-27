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
    return view('which-day');
});

Route::get('which-day', function (){
    return view('which-day');
});

Route::get('/admin123qwe', function () {
    return view('admin');
})->name('admin');


Route::get('/dash123qwe', function () {
    return view('admin');
})->name('dashboard');

Route::post('whick-day', 'App\Http\Controllers\WhichDayController@store');
Route::post('admin123qwe', 'App\Http\Controllers\AdminPanelController@index');
