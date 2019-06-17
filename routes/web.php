<?php
use App\Http\Controllers\ShoesContorller;

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

Route::get('view', 'ShoesContorller@index')->name('top');
Route::get('view/{shoes_id}', 'ShoesContorller@show');
Route::post('view/{shoes_i}', 'ShoesContorller@addComment')->name('shoes.comment');
