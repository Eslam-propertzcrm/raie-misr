<?php

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


Route::get('locale/{locale}',function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
})->name('switchLang');  //add name to router
 
Route::get('/', function () {
    return view('home');
});

//those two next lines has created automatically after running php artisan make:auth
Auth::routes();
/* Route::get('/home', 'HomeController@index'); */


Route::group(['middleware'=>'auth'], function(){
	Route::get('admin', function(){
		return view('admin.test.index');
	});
	Route::resource('aboutvisions', 'AboutVisionController');
});
