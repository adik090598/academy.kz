<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth', 'verify' => true], function () {
    Route::get('/admin/login', ['as' => 'admin.login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('/admin/login', ['as' => 'admin.login.post', 'uses' => 'LoginController@login']);
    Route::get('/admin/register', ['as' => 'admin.register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('/admin/register', ['as' => 'admin.register.post', 'uses' => 'RegisterController@create']);
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
    //Users
    Route::get('/user/edit', ['uses' => 'UserController@edit', 'as' => 'user.edit']);
    //Quizzes
    Route::get('/quizzes', ['uses' => 'QuizController@index', 'as' => 'quiz.index']);
    Route::get('/quiz/create', ['uses' => 'QuizController@create', 'as' => 'quiz.create']);
    Route::get('/quiz/get', ['uses' => 'QuizController@getQuizById', 'as' => 'quiz.get']);
    Route::get('/quiz/edit', ['uses' => 'QuizController@edit', 'as' => 'quiz.edit']);
    Route::post('/store', ['uses' => 'QuizController@store', 'as' => 'quiz.store']);
    Route::post('/update', ['uses' => 'QuizController@update', 'as' => 'quiz.update']);
    Route::post('/delete', ['uses' => 'QuizController@delete', 'as' => 'quiz.delete']);

    //Questions
    Route::get('/question/{id}', ['uses' => 'QuestionController@index', 'as' => 'question.index']);
    Route::get('/question/create', ['uses' => 'QuestionController@create', 'as' => 'question.create']);
    Route::get('/question/edit', ['uses' => 'QuestionController@edit', 'as' => 'question.edit']);
    Route::post('/question/store', ['uses' => 'QuestionController@store', 'as' => 'question.store']);
    Route::post('/question/update', ['uses' => 'QuestionController@update', 'as' => 'question.update']);
    Route::post('/question/delete', ['uses' => 'QuestionController@delete', 'as' => 'question.delete']);

    //Answer
    Route::get('/answers/{id}', ['uses' => 'AnswerController@index', 'as' => 'answer.index']);
    Route::get('/answer/create', ['uses' => 'AnswerController@create', 'as' => 'answer.create']);
    Route::get('/answer/edit', ['uses' => 'AnswerController@edit', 'as' => 'answer.edit']);
    Route::post('/answer/store', ['uses' => 'AnswerController@store', 'as' => 'answer.store']);
    Route::post('/answer/update', ['uses' => 'AnswerController@update', 'as' => 'answer.update']);
    Route::post('/answer/delete', ['uses' => 'AnswerController@delete', 'as' => 'answer.delete']);
});
Route::group(['namespace' => 'Core', 'middleware' => 'auth'], function () {
    Route::get('/admin/home', ['uses' => 'PageController@home', 'as' => 'admin.home']);
    Route::get('/admin', ['uses' => 'PageController@home']);
});

Route::group(['namespace' => 'Front',], function () {
    Route::get('/', ['uses' => 'HomeController@index']);
    Route::get('/welcome', [ 'as' => 'welcome', 'uses' => 'HomeController@index']);
    Route::get('/homeClient', ['as' => 'homeFront', 'uses' => 'HomeController@home']);
    Route::get('/login', ['as' => 'login', 'uses' => 'HomeController@login']);
    Route::get('/register', ['as' => 'register', 'uses' => 'HomeController@register', ]);
    Route::get('/test', ['uses' => 'TestController@index', 'as' => 'test.index']);
});



