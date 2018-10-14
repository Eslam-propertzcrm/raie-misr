<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getUrl($path)
    {
        $arr =  explode('/' , $path);
        // the next check for storage/app/
        if ($arr[1] === 'storage') {
            $arr[1] = 'public';
        }
        // the next check for /storage/posts_images/
        elseif ($arr[0] == 'public') {
            $arr[0] = '/storage';
        }

        // $url = implode('/' , $arr);
        $url = join('/' , $arr);
        return $url;
    }

     public function validate($request , $array)
    {
        $validator_result = Validator::make($request->all(), $array);
        if ($validator_result->fails())
            return response(['status'=>false, 'messages'=>$validator_result->messages()], 422);
    }

    public function transformWithPagination($pagination , $data, $var)
    {
        return array_merge([$var =>  $data ], [
                'paginator' => [
                    'current_page'=>$pagination['current_page'],
                    "from"=> $pagination['from'],
                    "last_page"=> $pagination['last_page'],
                    "next_page_url"=> $pagination['next_page_url'],
                    "path"=> $pagination['path'],
                    "per_page"=> $pagination['per_page'],
                    "prev_page_url"=> $pagination['prev_page_url'],
                    "to"=> $pagination['to'],
                    "total"=> $pagination['total']
                ]
            ]);
    }

    public function formateDate($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->toFormattedDateString();
        // ->toFormattedDateString()  // Dec 19, 2015
        // ->diffForHumans() // 2 hours ago
    }
}
