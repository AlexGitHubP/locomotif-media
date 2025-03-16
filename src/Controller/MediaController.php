<?php

namespace Locomotif\Media\Controller;


use Locomotif\Media\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MediaController extends Controller
{
    public function __construct()
    {
       $this->middleware(['authgate:administrator']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media = Media::orderBy('ordering', 'desc')->get();
        foreach ($media as $key => $value) {
            $media[$key]->file = asset($value->folder.'/'.$value->file);
        }
        
        return view('media::list')->with('media', $media);
    }

    public function mediaAssociations($owner, $ownerID){
        $media = Media::where('owner',    '=', $owner)
                        ->where('owner_id', '=', $ownerID)
                        ->orderBy('ordering', 'desc')
                        ->get();
        foreach ($media as $key => $value) {
            $media[$key]->file = asset($value->folder.'/'.$value->file);
        }
        
        return view('media::associatedMedia')->with('media', $media)->with('owner', $owner)->with('owner_id', $ownerID);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        $files = $request->file('media');
        foreach ($files as $key => $value) {
            

            $mediaElement = new Media();

            $mediaElement->original_name  = $value->getClientOriginalName();
            $mediaElement->file           = $value->hashName();
            $mediaElement->owner          = $request->owner;
            $mediaElement->owner_id       = $request->owner_id;
            $mediaElement->main           = 0;
            $mediaElement->folder         = 'media';
            $mediaElement->type           = $value->extension();
            $mediaElement->ordering       = getOrdering('media', 'ordering');
            $mediaElement->status         = 'published';
            
            $mediaElement->save();

            $value->store('public/media');
        }
        
    }

    public function ajaxEdit(Request $request){

        $mediaID = $request->mediaID;
        $media = Media::where('id', '=', $mediaID)->get()->first();
        $media->name = $media->file;
        $media->file = asset($media->folder.'/'.$media->file);
        
        return view('media::editModal')->with('media', $media);
    }

    public function ajaxDelete(Request $request){
        
        $mediaID = $request->mediaID;
        $media = Media::findOrFail($mediaID);
        $media->file = 'public/'.$media->folder.'/'.$media->file;
        
        if (Storage::exists($media->file)) {
            Storage::delete($media->file);
            $media->delete();
            
            $response['success'] = true;
            $response['message'] = 'Elementul a fost sters.';
            $response['type']    = 'mediaDelete';
        }else{
            $response['success'] = false;
            $response['message'] = 'A intervenit o eroare. Te rugăm încearcă din nou.';
            $response['type']    = 'mediaDelete';    
        }
        
        return response()->json($response);

    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}
