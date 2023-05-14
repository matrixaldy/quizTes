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
Route::prefix('auth')->name('auth.')->group(function() {
    Route::get('/', 'Auth\LoginController@login')->name('login');
    Route::post('/doLogin', 'Auth\LoginController@doLogin')->name('tryLogin');
    Route::get('/register', 'Auth\RegisterController@register')->name('register');
    Route::post('/register/store', 'Auth\RegisterController@store')->name('register.store');
});

Route::middleware('isLogin')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/s', 'Auth\LoginController@session');
    Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');
    Route::prefix('quiz')->name('quiz.')->group(function() {
        Route::get('/', 'User\QuizController@dashboard')->name('index');
        Route::post('/start', 'User\QuizController@start')->name('start');
        Route::get('/question', 'User\QuestionController@go')->name('question');
        Route::get('/time', 'User\QuizController@reloadTime')->name('time');
        Route::post('/sendAnswer', 'User\QuestionController@sendAnswer')->name('sendAnswer');
        Route::post('/finish', 'User\QuizController@finish')->name('finish');
    });

    Route::prefix('question')->name('question.')->group(function() {
        Route::get('/', 'Admin\QuestionController@index')->name('index');
    });

    Route::prefix('user')->name('user.')->group(function() {
        Route::get('/', 'Admin\UserController@index')->name('index');
    });
});
