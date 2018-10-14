<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // if you need to overwrite login method to authenticate with phone number rather than email
    // use the next block of code uncomment it
    // resource :: // https://laravelcode.com/post/laravel-55-login-with-only-mobile-number-using-laravel-custom-auth

    /*public function login(Request $request)
    {
        // Check validation
        Validator::make($request->all(), [
            'phone' => 'required|regex:/[0-9]{10}/|digits:10',            
        ]);

        // Get user record
        $user = \App\User::where(['phone'=>$request->get('phone')])->first();

        // Check Condition Mobile No. Found or Not
        if( !$user || !Hash::check($request->get('password') , $user->password) ) {
            \Session::put('error', 'Your mobile number not match in our system..!!');
            return back(); // ->with('error', 'Your mobile number not match in our system..!!')
        }        
        
        // Set Auth Details
        \Auth::login($user);

        // you can use just next if statement rather than all of the previous block of code
        /*
        if ( ! auth()->attempt(['phone'=>request('phone'), 'password'=>$request->password]))
        {
            \Session::put('error', 'Your mobile number not match in our system..!!');
            return back(); // ->with('error', 'Your mobile number not match in our system..!!')
        } 
        * / 
        
        // Redirect home page
        return redirect()->route('home');
    }*/
}
