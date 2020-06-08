<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function index(){
        
        return view('pages.index');
    }

    public function about(){
        $title = 'About us!';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['guitar', 'music theory', 'percussion']
        );
        return view('pages.services')->with($data);
    }
}