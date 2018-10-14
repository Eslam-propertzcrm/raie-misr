# Route (WEB & API)
## 1 - Basic get method with parameters
```
Route::get('/users/{id}/{name}',function($ids , $asmo){
	return "hello that is my " . $ids . " asmk yabny ahoh " . $asmo;
	return view('welcome');
	return view('post/index'); // this line is actually the same to the next one
    return view('post.index');
})/*->middleware('auth:api')*/;
```
## 2- you can add '/' or not
```
Route::get('about' , 'PagesController@about'); // this line and the next are simillar
Route::get('/about' , 'PagesController@about');
Route::resource('/posts' , 'PostsController');  // this line and the next are simillar
Route::resource('posts' , 'PostsController');
```
## 3 - How to point to controller inside some folders
```
/*,'namespace'=>'Api'  you can use namespace rather than Api\NameController */
Route::group(['namespace'=>'Api'], function(){}

// here i teach you how to access controller inside some folders
Route::get('test', 'Api\Auth\RegisterController@test');

// you can type only rather than except if you need
// Resource & controller inside directory
Route::resource('sections', 'Api\SectionsController', ['except' => ['create', 'edit']]);
```
## 4 - Basic Route Group
```
Route::group(['prefix'=>'ar', 'middleware'=>'auth'], function(){}
```
## 5 - Assign name to the Route
```
Route::get('login', function () {
	return 'sorry you are not authenticated';
});*/
// Route::get('login', 'Api\Auth\loginController@loign');

// you can not use the previouse comments but you can use any one of the next statements 
// and that is becase the auth middleware is using redirection with name rather than using URI 
// for more info look at the header of this table  >>> php artisan route:list
// redirect with name  			>>>>> return redirect()->route('login');   <<<< that is what the Auth middleware use so you must add name for your route
// redirect with normal URI 	>>>>> return redirect('login');

/*Route::get('login', ['as'=>'login', 'uses'=>function () {
	return response(['status'=>401, 'messages'=>'sorry you are not AUTHENTICATED'], 401);
}]);
		************ OR ************
Route::get('login', function () {
	return response(['status'=>401, 'messages'=>'sorry you are not AUTHENTICATED'], 401);
})->name('login');
```