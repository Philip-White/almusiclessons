<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use Illuminate\Support\Facades\Storage;
use DB;


class LessonsController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $lessons = Lesson::orderBy('created_at', 'desc')->paginate(11);
        return view('lessons.index')->with('lessons', $lessons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lessons.create');
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

        //Handle file upload

        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just extension

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;


            //upload the image

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);


        }else{
            $fileNameToStore = 'noimage.jpeg';
        }

        //Create Lesson
        $lesson = new Lesson;
        $lesson->title = $request->input('title');
        $lesson->body = $request->input('body');
        $lesson->user_id = auth()->user()->id;
        $lesson->cover_image = $fileNameToStore;
        $lesson->video1 = $request->input('video1');
        $lesson->save();

        return redirect('/lessons')->with('success', 'Lesson Created');
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
        $lesson = Lesson::find($id);
        return view('lessons.show')->with('lesson', $lesson);
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
        $lesson = Lesson::find($id);

        //Check for correct user

        if(Auth()->user()->id !== $lesson->user_id){
            return redirect('/lessons')->with('error', 'Unauthorized Page');
        }
        return view('lessons.edit')->with('lesson', $lesson);
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
            'body' => 'required',
        ]);


        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just extension

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;


            //upload the image

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);


        }

        //Create Lesson
        $lesson = Lesson::find($id);
        $lesson->title = $request->input('title');
        $lesson->body = $request->input('body');
        $lesson->video1 = $request->input('video1');
        if($request->hasFile('cover_image')){
            $lesson->cover_image = $fileNameToStore;
        }
        $lesson->save();

        return redirect('/lessons')->with('success', 'Lesson Updated');
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
        $lesson = Lesson::find($id);

        if(Auth()->user()->id !== $lesson->user_id){
            return redirect('/lessons')->with('error', 'Unauthorized Page');
        }

        if($lesson->cover_image != 'noimage.jpeg'){
            Storage::delete('public/cover_images/'.$lesson->cover_image);

        }


        $lesson->delete();

        return redirect('/lessons')->with('success', 'Lesson has been removed');
    }
}
