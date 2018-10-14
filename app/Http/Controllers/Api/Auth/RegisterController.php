<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use App\User;

class RegisterController extends Controller
{
	public function __construct()
	{
		// $this->middleware('auth:api', ['only'=>'index']); // rather than 'only' you can type except
	}

    public function index(Request $request)
    {
    	// $validator_result = $this->validate($request, ['username'=>'required|string|max:255|min:5',
    	$validator_result = Validator::make($request->all(), ['username'=>'required|string|max:255|min:5',

    		'email'=>'required|string|email|max:255|unique:users', 'password'=>'required|string|min:6|confirmed']);

    	if ($validator_result->fails())

    		return response(['status'=>false, 'messages'=>$validator_result->messages()], 422);

    	/* or you can type $request->email rather than request('email')*/

        //  i commented the next block because i added validation in email ( unique:users ) 
        // so you can replace the next block of code with this built in laravel validation ( unique:users )

    	/*
        if ( user::where(['email'=>$request->email])->first() )
    		// the next methods become nologer be suported with laravel greater than 4.2
    		// return $this->setStatusCode(400)->respondWithError('Yor email is already existing');
    		return response(['status'=>false, 'messages'=>'Yor email is already existing'], 400);
        */

    	$user = new user();
    	$user->username 	 = $request->username;
    	$user->email 	     = $request->email;
    	$user->password      = bcrypt($request->password); // Hash::make($request->password);
    	$user->api_token     = str_random(60);
    	$user->save();

    	return response(['status'=>Response::HTTP_CREATED,
                        'messages'=>'User has been registered successfully',
                        'user'=>$user,
                        'token'=>$user->api_token], 201);
    }
    
}
