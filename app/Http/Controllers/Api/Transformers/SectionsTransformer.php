<?php

namespace App\Http\Controllers\Api\Transformers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;

class SectionsTransformer extends Transformer
{
	public function transform ($section)
	{
	    return [
	    	'id' => $section['id'],
	    	'title' => $section['title'],
	    	'children' => isset($section['sub_sections']) ? $section['sub_sections'] : null,
	    	'created_at' => $section['created_at'],
	    	'updated_at' => $section['updated_at'],
	    	/*'value' => [
	    				'notes' => $section['notes'],
	    				'label' => $section['title'],
				    	'id'=>$section['id'],
				    	'user_id' => $section['user_id'],
				    	'has_note' => $section['have_note'],
				    	'is_owner' => $section['is_owner'],
				    ]*/
	    	// 'sub_sections' => $this->getSubSections($section['sub_sections'])
	    ];
	}

	public function transformCollectionWithSubSection($array)
    {
        return /*['sections'=>*/array_map([$this, 'transformWithSubSections'], $array);//];
    }

	public function transformWithSubSections ($section)
	{
	    return [
	    	'id' => $section['id'],
	    	'title' => $section['title'],
	    	'children' => $this->getSubSections($section['sub_sections']),
	    	'created_at' => $section['created_at'],
	    	'updated_at' => $section['updated_at'],
	    	/*'value' => [
	    				'notes' => $section['notes'],
	    				'label' => $section['title'],
				    	'id'=>$section['id'],
				    	'user_id' => $section['user_id'],
				    	'has_note' => $section['have_note'],
				    	// 'label' => $section['title'],
				    	'is_owner' => $section['is_owner'],
			    	]*/
	    ];
	}

	public function getSubSections($arr)
	{
		// breakpoint
		if (count($arr) == 0) {
			return null;
		}
		$merge = [];
		// loop for each json in the $arr
		foreach ($arr as  $json) {
			$arrRes = Section::where('section_id', $json['id'])->orderBy('created_at', 'desc')->with('sub_sections')
		                            ->get()->toArray();
		    $return = $this->getSubSections($arrRes);
		                            // ->paginate(5)
		                            // dump($dbResult2);

			$json['sub_sections'] = $return;
			$json = $this->transform($json);

			if (count($arr) > 1) {
				$merge = array_merge($merge , [$json]);
			}
			else
			{
				$merge = [$json];
				// $merge = $this->transform($merge);
			}
		}
		// $merge = $this->transformCollection($merge);
		return $merge;
	}

	/*public function getSubSections($arr)
	{
		$dbResult = [];
		if(count($arr) > 0)
		{
			foreach ($arr as $item) {
				$dbResult2 = Section::where('section_id', $item['id'])
		                            ->orderBy('created_at', 'desc')
		                            ->with('sub_sections')
		                            // ->paginate(5)
		                            ->get()->toArray();
		                            // dump($dbResult2);

		        $dbResult2 = (count($dbResult2) > 0) ? $this->transformCollection($dbResult2) : [];
		        // dump($dbResult2);
		        $x = $this->getSubSections($dbResult2);
				$dbResult2 = count($x) > 0 ? $x : $arr['sub_sections'] = $dbResult2;
				// $dbResult = array_merge($dbResult, $dbResult2);
				// $arr['sub_sections'] = $dbResult;
		        // dd($dbResult);
			}
			return $arr;
		}
		else
			return $arr;

		
	}*/
}
