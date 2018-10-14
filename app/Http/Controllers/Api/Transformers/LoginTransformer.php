<?php

namespace App\Http\Controllers\Api\Transformers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use Transformer;
class LoginTransformer extends Transformer
{
    public function transform($user)
    {
    	return [
    		'username' => $user['username'],
    		'email' => $user['email'],
    		'api_token' => $user['api_token']
    	];
    }
}
