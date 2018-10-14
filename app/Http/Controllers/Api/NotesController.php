<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;
use App\Note;
use App\Http\Controllers\Api\Transformers\NotesTransformer;
use Symfony\Component\HttpFoundation\Response;
// use App\Http\Controllers\Api\SectionsController;
use App\Http\Controllers\Api\Transformers\SectionsTransformer;

class NotesController extends Controller
{
    protected $transformerObj;

    public function __construct (NotesTransformer $transformerObj)
    {
        $this->transformerObj = $transformerObj;
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbResult = auth()->user()->notes()
                            // where('section_id', null)
                            ->orderBy('created_at', 'desc')
                            // ->with('sub_sections')
                            ->paginate(5)
                            ->toArray();
        return $this->transformWithPagination ( $dbResult ,
                $this->transformerObj->transformCollection($dbResult['data']) , 'notes' );
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
// validate
        if($result = $this->validate($request , ['title'=>'required|min:5',
                                                'description'=>'required|min:5',
                                                'image_name'=>'image|max:1999|nullable',
                                                'color' => 'required'
                                                // 'section_id' => 'required'
                                                ]))
            return $result;
    $note = new note();
    if ($request->has('section_id')) {
// check authorization
        if(auth()->user()->cannot('is_owner', Section::findOrFail($request->section_id)->user_id))
            return redirect()->route('login');
// check exesting of the SECTION_ID
        if ( ! Section::where('id', $request->section_id)->first()) {
            return response(['status' => Response::HTTP_NOT_FOUND,
                         'messages' => 'PARENT SECTION ID NOT FOUND'] ,
                          Response::HTTP_NOT_FOUND);
        }
        $note->section_id = $request->section_id;
    }
// Image operations
        $fileToStore = null;
        if ($request->hasFile('image_name')) {
            $path = $request->file('image_name')->store('public/notes_images');
            $fileToStore = $this->getUrl($path);
        }
// database saving data
        $note->title = $request->title;
        $note->description = $request->description;
        $note->color = $request->color;
        $note->image_path = $fileToStore;
        $note->user_id = auth()->user()->id;
        $note->save();
// return result
        // return $this->index();
        /*return response(['status' => Response::HTTP_CREATED,
                         'messages' => 'Note has been created'] ,
                          Response::HTTP_CREATED);*/
        $sections = new SectionsController(new SectionsTransformer());
        // return collect($this->index())->union($this->show());
        return $this->show($request->section_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dbResult = 
                    // note::where('section_id', $id)
                    auth()->user()->notes()->where('section_id', $id)
                            ->orderBy('created_at', 'desc')
                            // ->with('sub_sections')
                            ->paginate(10)
                            ->toArray();
        if (count($dbResult['data']) == 0)
            return response(['notes'=>[],'status'=> Response::HTTP_NOT_FOUND , 'messages' => 'sorry there is no Notes ']
                /*, esponse::HTTP_NOT_FOUND*/);
        
        return $this->transformWithPagination ( $dbResult , $this->transformerObj->transformCollection($dbResult['data']) , 'notes');
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
        $note = note::find($id);
// check the execting of the current note that you need to update
        if (! $note) 
            return response(['status' => Response::HTTP_NOT_FOUND, 'messages' => 'NOTE ID NOT FOUND'] ,
                      Response::HTTP_NOT_FOUND);
// check authorization
        if(auth()->user()->cannot('is_owner', $note->user_id))
            /* you must know that redirect to any get route it must be coming from get or post request */
            return redirect()->route('login');
// validate
        if($result = $this->validate($request , ['title'=>'required|min:5',
                                                'description'=>'required|min:5',
                                                'image_name'=>'image|max:1999|nullable',
                                                // 'section_id' => 'required'
                                                ])) 
            return $result;
// Image operations
        $fileToStore = $note->image_path;
        if ($request->hasFile('image_name')) {
            if ($note->image_path != '/storage/posts_images/noImage.jpg')
                // $this->getUrl($post->image_path) is equal to /public/posts_images/dsadad.jpg
                Storage::delete($this->getUrl($note->image_path));
            $path = $request->file('image_name')->store('public/notes_images');
            $fileToStore = $this->getUrl($path);
        }
// check exesting of the SECTION_ID which is the parent
        if ($request->has('section_id')) {
            if (! Section::where('id', $request->section_id)->first()) 
                return response(['status' => Response::HTTP_NOT_FOUND,
                             'messages' => 'PARENT SECTION ID NOT FOUND'] ,
                              Response::HTTP_NOT_FOUND);
            $note->section_id = $request->section_id;
        }
// database saving data
        $note->title = $request->title;
        $note->description = $request->description;
        $note->image_path = $fileToStore;
        $note->save();
// return result
        return $this->show($note->section_id);
        /*return response(['status' => Response::HTTP_CREATED,
                         'messages' => 'Note has been updated'] ,
                          Response::HTTP_CREATED);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dbResult = note::where(['id'=>$id])->first();
         if(! $dbResult )
            return response(['status'=>Response::HTTP_NOT_FOUND, 'messages'=>'this NOTE ID NOT FOUND'], Response::HTTP_NOT_FOUND);
        // check authorization
        if(auth()->user()->cannot('is_owner', $dbResult->user_id))
            /* you must know that redirect to any get route it must be coming from get or post request */
            return redirect()->route('login');
        // do delete
        $dbResult->delete();
        return $this->show($dbResult->section_id);
        // return response(['status'=>Response::HTTP_ACCEPTED, 'messages'=>'this Note has been deleted'], Response::HTTP_ACCEPTED);
    }
}

