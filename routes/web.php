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
	$about = App\AboutVision::where('id', 1)->get();
	$vision = App\AboutVision::where('id', 2)->get();
	$liveServices = App\LiveService::all();
	$healths = App\Health::all();
	$news = App\News::all();
	$finances = App\Finances::all();
    return view('home')->with(['about' => $about ,
    							'vision' => $vision, 
    							'liveServices'=> $liveServices,
    							'healths'=> $healths,
    							'news'=> $news,
    							'finances'=> $finances,
    							 ]);
});

//those two next lines has created automatically after running php artisan make:auth
Auth::routes();
/* Route::get('/home', 'HomeController@index'); */


Route::group(['middleware'=>'auth'], function(){
	Route::get('admin', function(){
		return view('admin.test.index');
	});

	Route::resource('aboutvisions', 'AboutVisionController');
	Route::resource('liveservices', 'LiveServiceController');
	Route::resource('healths', 'HealthController');
	Route::resource('news', 'NewsController');
	Route::resource('finances', 'FinanceController');
});
