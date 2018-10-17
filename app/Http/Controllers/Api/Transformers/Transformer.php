<?php

namespace App\Http\Controllers\Api\Transformers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class Transformer extends Controller
{
    public function transformCollection($array)
    {
    	// the first case
    	// you must know here that array_map send each element value to function as argument
    	// so if you send this ['id'=>'21', 'name'=>'soso'] >>>>> then $item = 21 and the second iteration will be soso
    	
    	// the second case
    	// but if you send this ['array_1' => ['id'=>'21', 'name'=>'soso'] , 'array_2' => ['id'=>'14', 'name'=>'lolo']]
    	// then at first iteration $item = ['id'=>'21', 'name'=>'soso'] and at the second one will be ['id'=>'14', 'name'=>'lolo']

    	// so in the second case >>> inside function you can say $item['name'] but in the first case you can't say $item['name']

        // return array_map(function($item){}, $array);

       	return array_map([$this, 'transform'], $array);
    }

    public abstract function transform($item);
}
