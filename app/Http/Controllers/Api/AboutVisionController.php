<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutVision;
use App\Http\Controllers\Api\Transformers\AboutVisionTransformer;
use Symfony\Component\HttpFoundation\Response;

class AboutVisionController extends Controller
{
    protected $transformerObj;

    public function __construct (AboutVisionTransformer $transformerObj)
    {
        $this->transformerObj = $transformerObj;
        // $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutVesion = AboutVision::where('id', $id)->first();
        if (! $aboutVesion) 
            return response(['status' => Response::HTTP_NOT_FOUND, 'messages' => 'About / Vision ID NOT FOUND'] ,
                      Response::HTTP_NOT_FOUND);
        return $this->transformerObj->tranform($aboutVesion->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aboutVesion = AboutVision::where('id', $id)->first();
        if (! $aboutVesion) 
            return response(['status' => Response::HTTP_NOT_FOUND, 'messages' => 'About / Vision ID NOT FOUND'] ,
                      Response::HTTP_NOT_FOUND);
        if($result = $this->validate($request , ['title_en'=>'required|min:5','title_ar'=>'required|min:5',
                                                'description_en'=>'required|min:5', 'description_ar'=>'required|min:5']))
            return $result;

        $aboutVesion->title_en = $request->title_en;
        $aboutVesion->title_ar = $request->title_ar;
        $aboutVesion->description_en = $request->description_en;
        $aboutVesion->description_ar = $request->description_ar;
        $aboutVesion->save();
        return response(['status'=>'200', 'About/section'=> 'Updated'], 200 , ['Header'=>'Value']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
