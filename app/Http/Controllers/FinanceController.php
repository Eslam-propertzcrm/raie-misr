<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finances;

class FinanceController extends Controller
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
        $finances = Finances::all();
        if (! $finances) 
            return rview('admin.finance')->with(['error' => 'ID NOT FOUND']);
       return view('admin.finance')->with(['finances'=> $finances]);
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
            $finance = Finances::where('id', $key)->first();
            if (! $finance) 
                return redirect('/finances/'.$id.'/edit')->with(['success' => 'ID NOT FOUND']);
            /*if($result = $this->validate($request , ['title_en'=>'required|min:5','title_ar'=>'required|min:5',
                                                    'number'=>'required|min:5']))
                return redirect('/finances/'.$id.'/edit')->with(['success' => $result]);*/
            // Image operations
            $fileToStore = $finance->image;
            if ( array_key_exists($key, $request->image_name) ) {
                if ($finance->image != $finance->image_path)
                    // $this->getUrl($post->image_path) is equal to /public/posts_images/dsadad.jpg
                    \Storage::delete($finance->image);
                // the next two lines are equevilant
                $path = $request->image_name[$key]->store('FinanceImages');
                // $path = $request['image_name'][$key]->store('NewImages');
                $fileToStore = $path;
            }

            $finance->title_en = $request->title_en[$key];
            $finance->title_ar = $request->title_ar[$key];
            $finance->image = $fileToStore;
            $finance->save();
        }
        return redirect('/finances/'.$id.'/edit')->with(['success'=>'Has been updated successfully']);
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
