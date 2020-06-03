<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Do these two commands first
         //Role::create(['name' => 'creator']);
         //Permission::create(['name' => 'create lessons']);
         //Then do these 3 
           //$role = Role::findById(1);
           //$permission = Permission::findById(1);
           //$role->givePermissionTo($permission);
           //Then do these 2 to setup a person for creating lessons...  Just Andrew  so far
         //auth()->user()->givePermissionTo('create lessons');
         //auth()->user()->assignRole('creator');
         //return auth()->user()->permissions;




        $user_id = auth()->user()->id;
        $lessons = User::find($user_id)->lessons;
        $intLessons = User::find($user_id)->intermediate_lessons;
        return view('home', ['lessons' => $lessons, 'intLessons' => $intLessons]);

        //return view('home')->with('lessons', $lessons);
    }
}
