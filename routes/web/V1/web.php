<?php

use Illuminate\Support\Facades\Route;


Route::get('/secure/config', ['uses' => 'ConfigController@configure']);
Route::get('/secure/config/migrate-refresh', ['uses' => 'ConfigController@migrateRefresh']);
Route::get('/secure/config/migrate', ['uses' => 'ConfigController@migrate']);
Route::get('/secure/config/db-seed', ['uses' => 'ConfigController@dbSeed']);
Route::get('/secure/config/clear-autoload', ['uses' => 'ConfigController@clearAutoLoad']);
Route::get('/secure/config/config-cache', ['uses' => 'ConfigController@configCache']);
Route::get('/secure/config/cache-clear', ['uses' => 'ConfigController@cacheClear']);
Route::get('/secure/config/key-generate', ['uses' => 'ConfigController@keyGenerate']);
Route::get('/secure/config/optimize', ['uses' => 'ConfigController@optimize']);

Route::group(['namespace' => 'Front'], function () {

    Route::group(['namespace' => 'Auth',], function () {
        Route::get('/registration', ['as' => 'register.form', 'uses' => 'RegisterController@showRegistrationForm']);
        Route::post('/register/', ['as' => 'register', 'uses' => 'RegisterController@register']);
        Route::get('/login', ['as' => 'login.form', 'uses' => 'LoginController@showLoginForm']);
        Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@login']);
    });

    Route::get('/', ['uses' => 'HomeController@index']);
    Route::get('/welcome', ['as' => 'welcome', 'uses' => 'HomeController@index']);
    Route::get('/quizzes', ['uses' => 'QuizController@index', 'as' => 'front.quiz.index']);

    Route::group(['middleware' => 'auth'], function () {
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/profile', ['as' => 'profile.profile', 'uses' => 'ProfileController@index']);
            Route::post('/update', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
            Route::get('/quizzes', ['as' => 'profile.quizzes', 'uses' => 'ProfileController@quizzes',]);
        });

        Route::group(['prefix' => 'quiz'], function () {
            Route::get('/{id}', ['as' => 'quiz.single', 'uses' => 'QuizController@quiz'])->where('id', '[0-9]+');
            Route::get('/pass/{id}', ['as' => 'quiz.pass', 'uses' => 'QuizController@pass',])->where('id', '[0-9]+');
            Route::post('/submit', ['as' => 'submit', 'uses' => 'QuizController@submit',]);
        });

    });
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('/login', ['as' => 'admin.login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('/login', ['as' => 'admin.login.post', 'uses' => 'LoginController@login']);
    Route::get('/register', ['as' => 'admin.register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('/register', ['as' => 'admin.register.post', 'uses' => 'RegisterController@create']);

    Route::group(['middleware' => 'auth'], function () {
        Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
        Route::get('/home', ['as' => 'admin.index', 'uses' => 'PageController@home']);
        Route::get('/admin', ['uses' => 'PageController@home']);
        //Users
        Route::get('/user/edit', ['uses' => 'UserController@edit', 'as' => 'user.edit']);

        //Subjects
        Route::get('/subject/', ['uses' => 'SubjectController@index', 'as' => 'subject.index']);
        Route::get('/subject/edit', ['uses' => 'SubjectController@edit', 'as' => 'subject.edit']);
        Route::post('/subject/store', ['uses' => 'SubjectController@store', 'as' => 'subject.store']);
        Route::post('/subject/update', ['uses' => 'SubjectController@update', 'as' => 'subject.update']);
        Route::post('/subject/delete', ['uses' => 'SubjectController@delete', 'as' => 'subject.delete']);

        //Quizzes
        Route::get('/quizzes', ['uses' => 'QuizController@index', 'as' => 'quiz.index']);
        Route::get('/quiz/create', ['uses' => 'QuizController@create', 'as' => 'quiz.create']);
        Route::get('/quiz/get', ['uses' => 'QuestionController@index', 'as' => 'quiz.get']);
        Route::get('/quiz/edit', ['uses' => 'QuizController@edit', 'as' => 'quiz.edit']);
        Route::post('/store', ['uses' => 'QuizController@store', 'as' => 'quiz.store']);
        Route::post('/update', ['uses' => 'QuizController@update', 'as' => 'quiz.update']);
        Route::post('/delete', ['uses' => 'QuizController@delete', 'as' => 'quiz.delete']);

        //Orders
        Route::get('/orders', ['uses' => 'OrderController@index', 'as' => 'order.index']);
        Route::get('/order/create', ['uses' => 'OrderController@create', 'as' => 'order.create']);
        Route::get('/order/get', ['uses' => 'OrderController@index', 'as' => 'order.get']);
        Route::get('/order/edit', ['uses' => 'OrderController@edit', 'as' => 'order.edit']);
        Route::post('/order/store', ['uses' => 'OrderController@store', 'as' => 'order.store']);
        Route::post('/order/update', ['uses' => 'OrderController@update', 'as' => 'order.update']);
        Route::post('/order/delete', ['uses' => 'OrderController@delete', 'as' => 'order.delete']);

        //Questions
        Route::get('/question/{id}', ['uses' => 'QuestionController@index', 'as' => 'question.index'])->where('id', '[0-9]+');
        Route::get('/question/create', ['uses' => 'QuestionController@create', 'as' => 'question.create']);
        Route::get('/question/edit', ['uses' => 'QuestionController@edit', 'as' => 'question.edit']);
        Route::post('/question/store', ['uses' => 'QuestionController@store', 'as' => 'question.store']);
        Route::post('/question/update', ['uses' => 'QuestionController@update', 'as' => 'question.update']);
        Route::post('/question/delete', ['uses' => 'QuestionController@delete', 'as' => 'question.delete']);
    });
});


