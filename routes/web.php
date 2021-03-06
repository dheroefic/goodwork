<?php

Route::get('login', 'Auth\LoginController@showLoginForm');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout');

Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');

Route::post('password/reset', 'Auth\ForgotPasswordController@reset');

Route::get('password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm');

Route::post('register/invite', 'UserController@sentInvitationToRegister')
    ->middleware('auth');

Route::get('register/{token}', 'Auth\RegisterController@showRegistrationForm');

Route::post('register/{token}', 'Auth\RegisterController@confirmNewRegistration');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    /**********************************
        Project
    **********************************/

    Route::get('projects', function () {
        return abort(404);
    });

    Route::post('projects', 'ProjectController@store');

    Route::get('projects/{project}', 'ProjectController@single');

    Route::get('projects/{project}/tasks', 'ProjectTaskController@index');

    Route::get('projects/{project}/messages', 'ProjectController@getAllMessages');

    Route::post('projects/{project}/messages', 'ProjectController@storeMessage');

    /**********************************
        Team
    **********************************/

    Route::get('teams', function () {
        return abort(404);
    });

    Route::post('teams', 'TeamController@store');

    Route::get('teams/{team}', 'TeamController@show');

    Route::get('teams/{team}/tasks', 'TeamTaskController@index');

    Route::get('teams/{team}/messages', 'TeamController@getAllMessages');

    Route::post('teams/{team}/messages', 'TeamController@storeMessage');

    /**********************************
     Office
     **********************************/

    Route::get('offices', function () {
        return abort(404);
    });

    Route::get('offices/{office}', 'OfficeController@show');

    Route::get('offices/{office}/messages', 'OfficeController@getAllMessages');

    Route::post('offices/{office}/messages', 'OfficeController@storeMessage');

    /**********************************
     Member
     **********************************/

    Route::post('/members', 'MemberController@store');

    Route::get('discussions', 'DiscussionController@index');

    Route::get('discussions/{discussion}', 'DiscussionController@index');

    Route::get('messages', 'MessageController@index');

    Route::get('messages/{message}', 'MessageController@index');

    Route::get('events', 'EventController@index');

    Route::get('events/{event}', 'EventController@index');

    Route::get('files', 'FileController@index');

    Route::get('files/{file}', 'FileController@index');

    /**********************************
        Task
    **********************************/

    Route::post('tasks', ['as' => 'tasks.store', 'uses' => 'TaskController@store']);

    Route::get('tasks/{task}', 'TaskController@show');

    /**********************************
        User
    **********************************/

    Route::get('users', 'UserController@index');

    Route::get('users/{user}', 'UserController@profile');

    Route::post('users/{user}/avatar', 'UserAvatarController@store');

    Route::get('users/{user}/settings', 'UserController@index');

    Route::get('settings', 'UserController@index');
});
