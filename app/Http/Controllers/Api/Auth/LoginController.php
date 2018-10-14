<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use App\User;
use App\Http\Controllers\Api\Transformers\LoginTransformer;

class LoginController extends Controller
{
    /*protected $loginTransObj;

    public function __construct(LoginTransformer $loginTransObj)
    {
        $this->loginTransObj = $loginTransObj;
    }*/

    public function index(Request $request)
    {
    	/*
        $validator_result = Validator::make($request->all(), ['email'=>'required|email', 'password'=>'required|min:6']);
    	if ($validator_result->fails())
    		return response(['status'=>false, 'messages'=>$validator_result->messages()], 422);
        */
        if($result = $this->validate($request , ['email'=>'required|email', 'password'=>'required|min:6']))
            return $result;

    	if ( ! auth()->attempt(['email'=>request('email'), 'password'=>$request->password]))
    		return response(['status'=>false, 'messages'=>'your cardientials is wrong'], 400);

    	auth()->user()->api_token = str_random(60);
        auth()->user()->save();

        $loginTransObj = new LoginTransformer();
        return response(['status'=>'200',
                         'user'=> $loginTransObj->transform(auth()->user()->toArray()),
                         'token'=> auth()->user()->api_token], 200 , ['Header'=>'Value']);

    }
    
}
