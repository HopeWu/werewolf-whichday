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
    return redirect('/which-day/0000');
});

Route::get('which-day/{activity_code?}', function ($activity_code="0000"){
    return view('which-day',[
        'activity_code' => $activity_code,
    ]);
});

Route::get('/admin123qwe', function () {
    return view('admin');
})->name('admin');


Route::get('/dash123qwe', function () {
    return view('admin');
})->name('dashboard');

Route::post('which-day/{activity_code}', 'App\Http\Controllers\WhichDayController@store');
Route::post('admin123qwe', 'App\Http\Controllers\AdminPanelController@index');
