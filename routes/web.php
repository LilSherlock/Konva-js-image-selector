<?php

use App\Http\Controllers\imageController;
use App\Models\image;
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

Route::get('/s3b4st14n', [imageController::class, 'index']);

Route::post('/s3b4st14n', [imageController::class, 'store'])->name('control');

Route::get('/s3b4st14npage', 'App\Http\Controllers\imageTableController@index')->name('table');

Route::get('/editimage/{id}', 'App\Http\Controllers\imageTableController@edit')->name('edit');

Route::get('/deleteimage/{id}', 'App\Http\Controllers\imageTableController@delete')->name('delete');
Route::put('/updateimage/{id}', 'App\Http\Controllers\imageTableController@update')->name('update');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
