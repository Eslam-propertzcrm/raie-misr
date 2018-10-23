<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Health;

class HealthController extends Controller
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
        $healths = Health::all();
        if (! $healths) 
            return rview('admin.liveservice')->with(['error' => 'ID NOT FOUND']);
       return view('admin.health')->with(['healths'=> $healths]);
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
            $health = Health::where('id', $key)->first();
            if (! $health) 
                return redirect('/healths/'.$id.'/edit')->with(['success' => 'ID NOT FOUND']);
            /*if($result = $this->validate($request , ['title_en'=>'required|min:5','title_ar'=>'required|min:5',
                                                    'number'=>'required|min:5']))
                return redirect('/healths/'.$id.'/edit')->with(['success' => $result]);*/
            // Image operations
            $fileToStore = $health->image;
            if ( array_key_exists($key, $request->image_name) ) {
                if ($health->image != $health->image_path)
                    // $this->getUrl($post->image_path) is equal to /public/posts_images/dsadad.jpg
                    \Storage::delete($health->image);
                // the next two lines are equevilant
                $path = $request->image_name[$key]->store('HealthImages');
                // $path = $request['image_name'][$key]->store('HealthImages');
                $fileToStore = $path;
            }

            $health->title_en = $request->title_en[$key];
            $health->title_ar = $request->title_ar[$key];
            $health->image = $fileToStore;
            $health->save();
        }
        return redirect('/healths/'.$id.'/edit')->with(['success'=>'Has been updated successfully']);
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
