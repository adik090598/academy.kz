<?php

use App\Models\Entities\Core\Role;
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
    Route::get('/competitions', ['uses' => 'QuizController@competitions', 'as' => 'front.quiz.competition']);

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/quizzes', ['uses' => 'QuizController@index', 'as' => 'front.quiz.index']);
        Route::get('/olympics', ['uses' => 'QuizController@olympics', 'as' => 'front.quiz.olympics']);
        Route::group(['middleware' => 'ROLE_OR:' . Role::TEACHER_ID . ',' . Role::LEARNER_ID], function () {

            Route::group(['prefix' => 'profile'], function () {
                Route::get('/profile', ['as' => 'profile.profile', 'uses' => 'ProfileController@index']);
                Route::post('/update', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
                Route::get('/quizzes', ['as' => 'profile.quizzes', 'uses' => 'ProfileController@quizzes',]);
                Route::get('/certificates', ['as' => 'profile.certificates', 'uses' => 'ProfileController@certificates',]);
                Route::get('/certificate/{id}', ['as' => 'profile.certificate', 'uses' => 'ProfileController@getCertificate',])->where('id', '[0-9]+');
            });

            Route::group(['prefix' => 'quiz'], function () {
                Route::get('/{id}', ['as' => 'quiz.single', 'uses' => 'QuizController@quiz'])->where('id', '[0-9]+');
                Route::post('/pass/{id}', ['as' => 'quiz.pass', 'uses' => 'QuizController@pass'])->where('id', '[0-9]+');
                Route::get('/start/{id}', ['as' => 'quiz.start', 'uses' => 'QuizController@start'])->where('id', '[0-9]+');
                Route::post('/submit', ['as' => 'quiz.submit', 'uses' => 'QuizController@submit',]);
            });
        });
    });
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::group(['namespace' => 'Auth',], function () {

        Route::get('/login', ['as' => 'admin.login', 'uses' => 'LoginController@showLoginForm']);
        Route::post('/login', ['as' => 'admin.login.post', 'uses' => 'LoginController@login']);
        Route::get('/register', ['as' => 'admin.register', 'uses' => 'RegisterController@showRegistrationForm']);
        Route::post('/register', ['as' => 'admin.register.post', 'uses' => 'RegisterController@create']);

        Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout'])->middleware('auth');

    });
    Route::group(['middleware' => ['auth', 'ROLE_OR:' . Role::ADMIN_ID],], function () {
        Route::get('/home', ['as' => 'admin.index', 'uses' => 'PageController@home']);
        Route::get('/', ['uses' => 'PageController@home']);
        //Users
        Route::get('/user/edit', ['uses' => 'UserController@edit', 'as' => 'user.edit']);

        //Subjects
        Route::get('/subject/', ['uses' => 'SubjectController@index', 'as' => 'subject.index']);
        Route::get('/subject/edit', ['uses' => 'SubjectController@edit', 'as' => 'subject.edit']);
        Route::post('/subject/store', ['uses' => 'SubjectController@store', 'as' => 'subject.store']);
        Route::post('/subject/update', ['uses' => 'SubjectController@update', 'as' => 'subject.update']);
        Route::post('/subject/delete', ['uses' => 'SubjectController@delete', 'as' => 'subject.delete']);

        //Regions
        Route::get('/region/', ['uses' => 'RegionController@index', 'as' => 'region.index']);
        Route::get('/region/edit', ['uses' => 'RegionController@edit', 'as' => 'region.edit']);
        Route::post('/region/store', ['uses' => 'RegionController@store', 'as' => 'region.store']);
        Route::post('/region/update', ['uses' => 'RegionController@update', 'as' => 'region.update']);

        //Cities
        Route::get('/city/', ['uses' => 'CityController@index', 'as' => 'city.index']);
        Route::get('/city/edit', ['uses' => 'CityController@edit', 'as' => 'city.edit']);
        Route::post('/city/store', ['uses' => 'CityController@store', 'as' => 'city.store']);
        Route::post('/city/update', ['uses' => 'CityController@update', 'as' => 'city.update']);

        //Areas
        Route::get('/area/', ['uses' => 'AreaController@index', 'as' => 'area.index']);
        Route::get('/area/edit', ['uses' => 'AreaController@edit', 'as' => 'area.edit']);
        Route::post('/area/store', ['uses' => 'AreaController@store', 'as' => 'area.store']);
        Route::post('/area/update', ['uses' => 'AreaController@update', 'as' => 'area.update']);

        //School
        Route::get('/school/', ['uses' => 'SchoolController@index', 'as' => 'school.index']);
        Route::get('/school/edit', ['uses' => 'SchoolController@edit', 'as' => 'school.edit']);
        Route::post('/school/store', ['uses' => 'SchoolController@store', 'as' => 'school.store']);
        Route::post('/school/update', ['uses' => 'SchoolController@update', 'as' => 'school.update']);

        //Quizzes
        Route::get('/quizzes', ['uses' => 'QuizController@index', 'as' => 'quiz.index']);
        Route::get('/quiz/create', ['uses' => 'QuizController@create', 'as' => 'quiz.create']);
        Route::get('/quiz/get', ['uses' => 'QuestionController@index', 'as' => 'quiz.get']);
        Route::get('/quiz/edit', ['uses' => 'QuizController@edit', 'as' => 'quiz.edit']);
        Route::post('/quiz/store', ['uses' => 'QuizController@store', 'as' => 'quiz.store']);
        Route::post('/quiz/update', ['uses' => 'QuizController@update', 'as' => 'quiz.update']);
        Route::post('/quiz/delete', ['uses' => 'QuizController@delete', 'as' => 'quiz.delete']);

        //Competitions
        Route::get('/competitions', ['uses' => 'QuizCompetitionController@index', 'as' => 'competition.index']);
        Route::get('/competition/create', ['uses' => 'QuizCompetitionController@create', 'as' => 'competition.create']);
        Route::get('/competition/edit', ['uses' => 'QuizCompetitionController@edit', 'as' => 'competition.edit']);
        Route::post('/competition/store', ['uses' => 'QuizCompetitionController@store', 'as' => 'competition.store']);
        Route::post('/competition/update', ['uses' => 'QuizCompetitionController@update', 'as' => 'competition.update']);
        Route::post('/competition/delete', ['uses' => 'QuizCompetitionController@delete', 'as' => 'competition.delete']);

        //Orders
        Route::get('/orders', ['uses' => 'OrderController@index', 'as' => 'order.index']);
        Route::post('/order/accept/{id}', ['uses' => 'OrderController@accept', 'as' => 'order.accept'])->where('id', '[0-9]+');

        //QuizResult
        Route::get('/results', ['uses' => 'QuizResultController@index', 'as' => 'result.index']);
        Route::get('/result/{id}', ['uses' => 'QuizResultController@userResult', 'as' => 'result.user'])->where('id', '[0-9]+');

        //Questions
        Route::get('/question/{id}', ['uses' => 'QuestionController@index', 'as' => 'question.index'])->where('id', '[0-9]+');
        Route::get('/question/create', ['uses' => 'QuestionController@create', 'as' => 'question.create']);
        Route::get('/question/edit', ['uses' => 'QuestionController@edit', 'as' => 'question.edit']);
        Route::post('/question/store', ['uses' => 'QuestionController@store', 'as' => 'question.store']);
        Route::post('/question/update', ['uses' => 'QuestionController@update', 'as' => 'question.update']);
        Route::post('/question/delete', ['uses' => 'QuestionController@delete', 'as' => 'question.delete']);
    });
});


