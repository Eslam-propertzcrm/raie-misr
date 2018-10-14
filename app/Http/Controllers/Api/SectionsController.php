<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;
use App\Note;
use App\Http\Controllers\Api\Transformers\SectionsTransformer;
use Symfony\Component\HttpFoundation\Response;

class SectionsController extends Controller
{
    protected $transformerObj;

    public function __construct (SectionsTransformer $transformerObj)
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
        $dbResult = /*Section::where('section_id', null)*/
                    auth()->user()->sections()->where('section_id', null)
                            ->orderBy('created_at', 'desc')
                            ->with('sub_sections')
                            // ->paginate(5)
                            ->get()
                            ->toArray();
        /*return $this->transformWithPagination ( $dbResult ,
         $this->transformerObj->transformCollectionWithSubSection($dbResult['data']), 'sections' );*/
        return $this->transformerObj->transformCollectionWithSubSection($dbResult);
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
        /*$validator_result = Validator::make($request->all(), ['title'=>'required|min:5']);
        if ($validator_result->fails())
            return response(['status'=>false, 'messages'=>$validator_result->messages()], 422);*/
        if($result = $this->validate($request , ['title'=>'required|min:5'])) return $result;

        $section = new section();
        $section->title = $request->title;
        $section->user_id = auth()->user()->id;
        $section->section_id = null;

        if( $request->has('section_id') )
            if ($dbResult = section::where('id', $request->section_id)->first()) 
            {
                // check authorization
                if(auth()->user()->cannot('is_owner', $dbResult->user_id))
                    return redirect()->route('login');
                $section->section_id = $request->section_id;
            }
            else
                return response(['status' => Response::HTTP_NOT_FOUND,
                         'messages' => 'PARENT SECTION ID NOT FOUND'] ,
                          Response::HTTP_NOT_FOUND);

        $section->save();
        return $this->index();
        /*return response(['status' => Response::HTTP_CREATED,
                         'messages' => 'Section has been created'] ,
                          Response::HTTP_CREATED);*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dbResult = Section::where('section_id', $id)
                            ->orderBy('created_at', 'desc')
                            // ->with('sub_sections')
                            ->paginate(5)
                            ->toArray();
        if (count($dbResult['data']) == 0) 
            return response(['status'=> Response::HTTP_NOT_FOUND , 'messages' => 'sorry there is no sub_sections '],
                Response::HTTP_NOT_FOUND);
        return $this->transformWithPagination ( $dbResult , $this->transformerObj->transformCollection($dbResult['data']) , 'sections' );
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
        $section = section::where('id', $id)->first();
        if (! $section) 
            return response(['status' => Response::HTTP_NOT_FOUND, 'messages' => 'SECTION ID NOT FOUND'] ,
                      Response::HTTP_NOT_FOUND);
        // check authorization
        if(auth()->user()->cannot('is_owner', $section->user_id))
            /* you must know that redirect to any get route it must be coming from get or post request */
            return redirect()->route('login');

        if($result = $this->validate($request , ['title'=>'required|min:5'])) return $result;

        $section->title = $request->title;
        $section->save();

        return $this->index();
        /*return response(['status' => Response::HTTP_CREATED,
                         'messages' => 'Section has been UPDATED'] ,
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
        $dbResult = section::where(['id'=>$id])->first();
         if(! $dbResult )
            return response(['status'=>Response::HTTP_NOT_FOUND, 'messages'=>'this section ID NOT FOUND'],
            Response::HTTP_NOT_FOUND);
        if(auth()->user()->cannot('is_owner', $dbResult->user_id))
            /* you must know that redirect to any get route it must be coming from get or post request */
            return redirect()->route('login');
        $dbResult->delete();
        return $this->index();
        /*return response(['status'=>Response::HTTP_ACCEPTED, 'messages'=>'this section has been deleted'],
            Response::HTTP_ACCEPTED);*/
    }
}
