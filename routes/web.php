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
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
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


// admin認証後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'],function () {
    Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('/view', 'Admin\AdminShoesController@index')->name('admin.top');
    Route::get('/create', 'Admin\AdminShoesController@showCreateForm')->name('admin.create');
    Route::post('/create', 'Admin\AdminShoesController@create');
    Route::get('/show/{id}', 'Admin\AdminShoesController@show')->name('admin.show');
    Route::get('/edit/{id}', 'Admin\AdminShoesController@edit')->name('admin.edit');
    Route::post('/edit/{id}', 'Admin\AdminShoesController@update')->name('admin.update');
    Route::post('delete/{id}', 'Admin\AdminShoesController@delete')->name('admin.delete');
});

