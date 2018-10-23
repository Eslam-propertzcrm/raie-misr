<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
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
        $news = News::all();
        if (! $news) 
            return rview('admin.news')->with(['error' => 'ID NOT FOUND']);
       return view('admin.news')->with(['news'=> $news]);
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
            $new = News::where('id', $key)->first();
            if (! $new) 
                return redirect('/news/'.$id.'/edit')->with(['success' => 'ID NOT FOUND']);
            /*if($result = $this->validate($request , ['title_en'=>'required|min:5','title_ar'=>'required|min:5',
                                                    'number'=>'required|min:5']))
                return redirect('/news/'.$id.'/edit')->with(['success' => $result]);*/
            // Image operations
            $fileToStore = $new->image;
            if ( array_key_exists($key, $request->image_name) ) {
                if ($new->image != $new->image_path)
                    // $this->getUrl($post->image_path) is equal to /public/posts_images/dsadad.jpg
                    \Storage::delete($new->image);
                // the next two lines are equevilant
                $path = $request->image_name[$key]->store('NewImages');
                // $path = $request['image_name'][$key]->store('NewImages');
                $fileToStore = $path;
            }

            $new->title_en = $request->title_en[$key];
            $new->title_ar = $request->title_ar[$key];
            $new->image = $fileToStore;
            $new->save();
        }
        return redirect('/news/'.$id.'/edit')->with(['success'=>'Has been updated successfully']);
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
