<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IntermediateLesson;
use Illuminate\Support\Facades\Storage;
use DB;

class IntermediateLessonsController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:creator')->only('create');
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$intLessons = IntermediateLesson::all();
        $intLessons = IntermediateLesson::orderBy('created_at', 'desc')->paginate(3);

        return view('intermediateLessons.index')->with('intLessons', $intLessons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('intermediateLessons.create');
        
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

            //Handle File upload
            if($request->hasFile('cover_image')){
                //Get filename with the extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

            }else{
                $fileNameToStore = 'noimage.jpg';
            }

        $intLesson = new IntermediateLesson;
        $intLesson->title = $request->input('title');
        $intLesson->body = $request->input('body');
        $intLesson->user_id = auth()->user()->id;
        $intLesson->cover_image = $fileNameToStore;
        $intLesson->video1 = $request->input('video1');

        $intLesson->save();

        return redirect('/intermediatelessons')->with('success', 'Lesson Created!');
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
        $intLessons = IntermediateLesson::find($id);
        return view('intermediateLessons.show')->with('intLessons', $intLessons);
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
        $intLesson = IntermediateLesson::find($id);


        if(auth()->user()->id !== $intLesson->user_id){
            return redirect('/intermediatelessons')->with('error', 'Unauthorized Page');
        }
        return view('intermediateLessons.edit')->with('intLesson', $intLesson);
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
        //
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

         //Handle File upload
         if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }

        $intLesson = IntermediateLesson::find($id);
        $intLesson->title = $request->input('title');
        $intLesson->body = $request->input('body');
        $intLesson->video1 = $request->input('video1');

//directly below is where we stop the storage build up in our public/cover_image folder
//Each time a user edits their lesson or 'post' they will have to submit their
//picture file again...  in testing...june3/2020
        if($intLesson->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$intLesson->cover_image);

        }
//ends...  in testing...june3/2020


        if($request->hasFile('cover_image')){
            $intLesson->cover_image = $fileNameToStore;
        }

        $intLesson->save();

        return redirect('/intermediatelessons')->with('success', 'Lesson Updated!');
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
        $intLesson = IntermediateLesson::find($id);
        if(auth()->user()->id !== $intLesson->user_id){
            return redirect('/intermediatelessons')->with('error', 'Unauthorized Page');
        }

        if($intLesson->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/cover_images/' .$intLesson->cover_image);
        }

        $intLesson->delete();

        return redirect('/intermediatelessons')->with('success', 'Lesson Removed');
    }
}
