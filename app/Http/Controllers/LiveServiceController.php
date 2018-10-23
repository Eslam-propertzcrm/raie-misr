<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LiveService;

class LiveServiceController extends Controller
{
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $liveServices = LiveService::all();
        if (! $liveServices) 
            return rview('admin.liveservice')->with(['error' => 'ID NOT FOUND']);
       return view('admin.liveservice')->with(['liveServices'=> $liveServices]);
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
        foreach ($request->title_en as $key => $value) {
            $liveService = LiveService::where('id', $key)->first();
            if (! $liveService) 
                return redirect('/liveservices/'.$id.'/edit')->with(['success' => 'ID NOT FOUND']);
            /*if($result = $this->validate($request , ['title_en'=>'required|min:5','title_ar'=>'required|min:5',
                                                    'number'=>'required|min:5']))
                return redirect('/liveservices/'.$id.'/edit')->with(['success' => $result]);*/
            $liveService->title_en = $request->title_en[$key];
            $liveService->title_ar = $request->title_ar[$key];
            $liveService->number = $request->number[$key];
            $liveService->save();
        }
        return redirect('/liveservices/'.$id.'/edit')->with(['success'=>'Has been updated successfully']);
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
