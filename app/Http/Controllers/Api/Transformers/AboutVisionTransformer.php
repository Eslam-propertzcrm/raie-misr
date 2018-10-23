<?php

namespace App\Http\Controllers\Api\Transformers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutVisionTransformer extends Transformer
{
    public function transform($aboutVision)
    {
    	return [
	    	'id' => $aboutVision['id'],
	    	'title_en' => $aboutVision['title_en'],
	    	'title_ar' => $aboutVision['title_ar'],
	    	'description_en' => $aboutVision['description_en'],
	    	'description_ar' => $aboutVision['description_ar'],
	    ];
    }
}