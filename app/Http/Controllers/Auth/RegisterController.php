<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'password' => bcrypt($data['password']),
        ]);

        /*
            you must know that there are a big difference between Hashing and  Encryption

            if you encrypted password you can retrive it and decrypt it ( but )
            if you hased password you can't decrypt Hash Password , You can only retrive it and do a comparison.
            ->>> so hashing is more secure than encryption <<<<-

            Passwords are hashed, not encrypted. That means they can’t be reversed into their plain text form.
            This is for security reasons. If someone downloads your database, they shouldn’t be able to reverse each of
            your users’ passwords. It’s also a security issue to simply display a password back to the user
            in case they’re on an insecure network and someone is eavesdropping on the connection.
            If you need to display a password, then you’re doing something wrong.

            refernce :: https://laracasts.com/discuss/channels/laravel/how-to-decrypt-hash-password-in-laravel
        */
    }


    /*public function postRegister(Request $request)
    {
        $validator = $this->registrar->validator($request->all());
        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        // $this->auth->login($this->registrar->create($request->all()));
        return $this->redirectTo;
    }*/
}
