<?php
// it is important note just in laravel >>>> the name of 
// the class inside the file must and must be the same name of the file name because if you noticed that at each file in laravel 
// you are type {{ use App\lolo\soso; }} and that must happen only if
// you include or include_once its filename or require or require_once
// so laravel need the name of the file be the exact same of the class name inside the file to make this operation automatically
// and that is happen buy native php function called spl_autoload_register() and there is another magic method called __autoload($class)
// which will be called automatically when use statement gets executed with the class to be used as an argument and this can help you to load the class at run-time on the fly as and when needed.
/*spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // you must know that the next statement in the comment mean that this middleware will be applied on nothing because you say only nothing 
        // so you must remove the seconde argument
        // and by the way i you say except nothing it will not ignore any action because
        // you didn't mention anyone and in this case the middleware will be applied on the all action in this controller
        // $this->middleware('auth', ['only'=>['']]);

        // $this->middleware('auth', ['only'=>'create']);
        // $this->middleware('auth', ['except' => 'index']);
        
        // the next two lines will give you the same result
        // $this->middleware('auth', ['only' => ['create','store','edit' ,'update', 'destroy'] ]);
        // $this->middleware('auth', ['except' => ['index', 'show']]);

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');


        // $p = new post();
        // $posts = post::all(); // eloquent method (ORM) object-relational mapping
        // $posts = post::orderBy('title','desc')->take(1)->get();
        // return $posts = post::where('title','post two')->get();
        // $posts = DB::select('select * from posts'); // Fluent query-builder
        // $posts = post::orderBy('title','desc')->paginate(1);  /*{{$posts->links()}}*/
        // --------------------------------------------------------------
        /* 
        * if you specified the type of the field in the validator [image or date etc..] and sent empty field 
        * the validator will consider it will be null and raise up error message , so you can also put
        * >>>>>>>>>>> nullable <<<<<<<<
        */
        // $this->validate($request , ['title'=>'required' ,'body'=>'required', 'image_name'=>'image|max:1999|nullable']);

        // ------------------------------------------------------------

        // Handle File Upload
        /*if ($request->hasFile('image_name')) {
           

            // Get File name with extension
            $fileWithExt = $request->file('image_name')->getClientOriginalName();
            // Get File name without extension by native php function
            $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
            // Get just File extension 
            $extension = $request->file('image_name')->getClientOriginalExtension();
            // filename to store in DB
            $fileToStore = $filename.'_'.time().'.'.$extension;
            // upload image content to host
            $request->file('image_name')->storeAs('public/posts_images', $fileToStore);

            // you can replace all of the above this this two lines ^_^
            $path = $request->file('image_name')->store('public/posts_images');
            
            $fileToStore = $this->getUrl($path);
            }
            else {
                $fileToStore = '/storage/posts_images/noImage.jpg';
            }*/
            // --------------------------------------------------
            /*$title = "Hello, world!";
            return view('pages.index' , compact('title'));
            // return view('pages.index')->with('the name that will be used in blade file' , $title);
            
            $data = array(
                      'title' => 'Services',
                      'list' => ['service 1' , 'service 2' , 'service 3']
                      );
            return view('pages.services')->with($data);

            */

            // ---------------------------------------

            // i will  check authintication before show edit view
            // in the next line i have option to use $post->usr->id
            // instead of using $post->user_id but here i prefered use the second one 
            // becase it faster than another one because the first one will invoke _get
            // which is will take time for searching about method with name usr and also 
            // it will take time for creating new property with new object .
            /*if (auth()->user()->id !== $post->user_id) {
                return redirect('/posts')->with('error', 'you can not access this page');
            }*/
            // -------------------------------------------

            // those next two statments are similar
            // \Session::put('error', 'you can not access this page');
            // back()->with('error', 'you can not access this page')
            // redirect('/posts')->with('error', 'you can not access this page')
    }
}
