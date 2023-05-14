<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');

Route::middleware('auth:api')->group(function() {
    Route::get('/profile', 'API\AuthController@profile');
    Route::prefix('quiz')->group(function() {
        Route::get('/info', 'Api\Quiz\QuizController@quiz');
        Route::post('/start', 'Api\Quiz\QuizController@start');
        Route::get('/random', 'Api\Quiz\QuestionController@randomQuestion');
        Route::post('/sendAnswer', 'Api\Quiz\QuestionController@sendAnswer');
        Route::post('/finish', 'Api\Quiz\QuestionController@finish');
        Route::get('/time', 'Api\Quiz\QuestionController@requestTime');
    });

    Route::prefix('question')->group(function() {
        Route::get('/', 'Api\Quiz\QuestionController@index');
    });

    Route::prefix('users')->group(function() {
        Route::get('/', 'Api\UserController@index');
    });
});
