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

// ユーザー認証不要
Auth::routes();
Route::get('view', 'ShoesController@index')->name('top');
Route::get('view/{shoes_id}', 'ShoesController@show');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () { return redirect('/view'); });


// ユーザーログイン後
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('view/{shoes_id}', 'ShoesController@addComment')->name('shoes.comment');
    Route::post('view/like/{shohes_id}', 'LikesController@like')->name('like');
});

// Admin認証不要
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () { return redirect('/admin/home'); });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
});

// admin認証不要
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});

