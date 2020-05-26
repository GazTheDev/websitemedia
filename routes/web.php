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
    $pages = App\Page::where('slug', '=', '/')->firstOrFail();
    return view('pages', compact('pages'));
    return view('location', compact('posts'));

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/post', function () {
    $posts =     App\Post::orderBy("created_at", "desc")->get();


    return view('posts', compact('posts'));
});
Route::get('/pages/{slug}', function($slug){
    $pages = App\Page::where('slug', '=', $slug)->firstOrFail();
    return view('pages', compact('pages'));
});

Route::get('post/{slug}', function($slug){
	$post = App\Post::where('slug', '=', $slug)->firstOrFail();
	return view('single_post', compact('post'));
});
Route::get('/contact', 'EmailController@emailView')->name('email-view');
Route::post('/send-email', 'EmailController@sendEmail')->name('send-email');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user', 'UserController@show')->name('user');
Route::post('user/update', 'UserController@update')->name('user.update');
