<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('memo', function () {
    return view('home');
});

Route::get('report', function () {
    return view('home');
});

Route::get('proc/{proc}','MymoneyController@proc');

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('laravel.v', function() {#-เช็คเวอชั่น LARAVEL
    $laravel = app();
    return "Your Laravel version is ".$laravel::VERSION;
});

Route::get('demo', function () {
    return view('angular_ui');
});
