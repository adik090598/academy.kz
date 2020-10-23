<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth', 'verify' => true], function () {

    Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('/login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
    Route::group(['middleware' => 'auth'], function () {
        Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
    });
});
Route::get('/secure/config', ['uses' => 'ConfigController@configure']);
Route::get('/secure/config/migrate-refresh', ['uses' => 'ConfigController@migrateRefresh']);
Route::get('/secure/config/migrate', ['uses' => 'ConfigController@migrate']);
Route::get('/secure/config/db-seed', ['uses' => 'ConfigController@dbSeed']);
Route::get('/secure/config/clear-autoload', ['uses' => 'ConfigController@clearAutoLoad']);
Route::get('/secure/config/config-cache', ['uses' => 'ConfigController@configCache']);
Route::get('/secure/config/cache-clear', ['uses' => 'ConfigController@cacheClear']);
Route::get('/secure/config/key-generate', ['uses' => 'ConfigController@keyGenerate']);
Route::get('/secure/config/optimize', ['uses' => 'ConfigController@optimize']);

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    //Quizzes
    Route::get('/quizzes', ['uses' => 'QuizController@index', 'as' => 'quiz.index']);
    Route::get('/quiz/create', ['uses' => 'QuizController@create', 'as' => 'quiz.create']);
    Route::get('/quiz/edit', ['uses' => 'QuizController@edit', 'as' => 'quiz.edit']);
    Route::post('/store', ['uses' => 'QuizController@store', 'as' => 'quiz.store']);
    Route::post('/update', ['uses' => 'QuizController@update', 'as' => 'quiz.update']);
    Route::post('/delete', ['uses' => 'QuizController@delete', 'as' => 'quiz.delete']);

});
Route::group(['namespace' => 'Core', 'middleware' => 'auth'], function () {
    Route::get('/home', ['uses' => 'PageController@home', 'as' => 'home']);
    Route::get('/', ['uses' => 'PageController@home']);


});

Route::group(['namespace' => 'Front', 'middleware' => 'auth'], function () {
    Route::get('/welcome', ['uses' => 'HomeController@index', 'as' => 'welcome']);

});

