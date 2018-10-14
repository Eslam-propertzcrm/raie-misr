<?php

namespace App\Http\Controllers\Api\Transformers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotesTransformer extends Transformer
{
    public function transform($note)
    {
    	return [
	    	'id' => $note['id'],
	    	'user_id' => $note['user_id'],
	    	'title' => $note['title'],
	    	'description' => $note['description'],
	    	'image_path' => url('/') . $note['image_path'],
	    	'color' => $note['color'],
	    	'created_at' => $this->formateDate($note['created_at']),
	    	'updated_at' => $this->formateDate($note['updated_at']),
	    	'is_owner' => $note['is_owner'],
	    	'parent_title' => $note['parent_title'],
	    	// 'childeren' => isset($note['sub_notes']) ? $note['sub_sections'] : [],
	    	// 'sub_sections' => $this->getSubSections($section['sub_sections'])
	    ];
    }
}
