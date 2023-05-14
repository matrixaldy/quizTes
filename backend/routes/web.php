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

Route::get('/login', 'AuthController@loginPage')->name('login');
Route::post('/auth', 'AuthController@doLogin')->name('auth');
Route::middleware('auth:web')->group(function() {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::prefix('user')->name('user.')->group(function() {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/store', 'UserController@store')->name('store');
        Route::get('/edit/{id}', 'UserController@edit')->name('edit');
        Route::post('/update/{id}', 'UserController@update')->name('update');
        Route::get('/delete/{id}', 'UserController@delete')->name('delete');
    });

    Route::prefix('quiz')->name('quiz.')->group(function() {
        Route::get('/', 'Quiz\QuestionController@index')->name('index');
        Route::get('/create', 'Quiz\QuestionController@create')->name('create');
        Route::post('/store', 'Quiz\QuestionController@store')->name('store');
        Route::get('/edit/{id}', 'Quiz\QuestionController@edit')->name('edit');
        Route::post('/update/{id}', 'Quiz\QuestionController@update')->name('update');
        Route::get('/delete/{id}', 'Quiz\QuestionController@delete')->name('delete');
        Route::get('/reset', 'Quiz\QuestionController@resetQuiz')->name('reset');
        Route::get('/import', 'Quiz\ImportController@importPage')->name('import');
        Route::post('/import/store', 'Quiz\ImportController@import')->name('import.store');
    });

    Route::get('/setting', 'SettingController@index')->name('setting');
    Route::post('/setting/update', 'SettingController@update')->name('setting.update');
});
