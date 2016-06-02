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

Route::get('/', 'HomeController@index');

Route::auth();

Route::group(['prefix' => 'admin'], function () {
    Route::resource('group', 'GroupController');
    Route::resource('question', 'QuestionController');
    Route::resource('answer', 'AnswerController');
    Route::resource('test', 'TestController');
    Route::post('/admin/test/add', ['as' => 'admin.test.add', 'uses' => 'TestController@addQuestion']);
    Route::post('/admin/test/remove', ['as' => 'admin.test.remove', 'uses' => 'TestController@removeQuestion']);
    Route::get('/result', ['as' => 'admin.result.index', 'uses' => 'ResultController@index']);
    Route::get('/result/{id}', ['as' => 'admin.result.show', 'uses' => 'ResultController@show']);
});

Route::get('/test/{id}', ['as' => 'test.pass', 'uses' => 'TestController@passTest']);
Route::post('/result/store', ['as' => 'result.store', 'uses' => 'ResultController@store']);