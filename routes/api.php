<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
   	// return App\User::all();
    return $request->user();
});

Route::get('login', ['as'=>'login', 'uses'=>function () {
	return response(['status'=>401, 'messages'=>'sorry you are not AUTHENTICATED'], 401);
}]);

Route::post('login', 'Api\Auth\LoginController@index');

Route::post('register', 'Api\Auth\RegisterController@index');

Route::get('test', 'Api\Auth\RegisterController@test');

/*,'namespace'=>'Api'  you can use namespace rather than Api\NameController */



Route::group(['middleware'=>'auth:api'], function(){
	Route::resource('sections', 'Api\SectionsController', ['except' => ['create', 'edit']]);
	Route::resource('notes', 'Api\NotesController', ['except' => ['create', 'edit']]);
	Route::get('sections/{id}/notes', 'Api\NotesController@show');
});
	// Route::delete('sections/{id}/notes', 'Api\NotesController@destroy');
