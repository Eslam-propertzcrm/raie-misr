<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $aboutVision = AboutVision::where('id', $id)->first();
        if (! $aboutVision) 
            return response(['status' => Response::HTTP_NOT_FOUND, 'messages' => 'About / Vision ID NOT FOUND'] ,
                      Response::HTTP_NOT_FOUND);
        return $this->transformerObj->tranform($aboutVision->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutVision = AboutVision::where('id', $id)->first();
        if (! $aboutVision) 
            return response(['status' => Response::HTTP_NOT_FOUND, 'messages' => 'About / Vision ID NOT FOUND'] ,
                      Response::HTTP_NOT_FOUND);
       return view('admin.AboutVision')->with(['aboutVision'=>$aboutVision]);
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
        $aboutVision = AboutVision::where('id', $id)->first();
        if (! $aboutVision) 
            return response(['status' => Response::HTTP_NOT_FOUND, 'messages' => 'About / Vision ID NOT FOUND'] ,
                      Response::HTTP_NOT_FOUND);
        if($result = $this->validate($request , ['title_en'=>'required|min:5','title_ar'=>'required|min:5',
                                                'description_en'=>'required|min:5', 'description_ar'=>'required|min:5']))
            return $result;

        $aboutVision->title_en = $request->title_en;
        $aboutVision->title_ar = $request->title_ar;
        $aboutVision->description_en = $request->description_en;
        $aboutVision->description_ar = $request->description_ar;
        $aboutVision->save();
        // dd($aboutVision->title_ar);
        return redirect('/aboutvisions/'.$id.'/edit')->with(['success'=>'Has been updated successfully']);
        // return view('admin.AboutVision')->with(['success'=>'Has been updated successfully','aboutVision'=>$aboutVision]);
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

