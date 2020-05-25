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
        //Role::create(['name' => 'writer']);
        //Permission::create(['name' => 'write lessons']);
        //auth()->user()->givePermissionTo('write lessons');
        //auth()->user()->assignRole('writer');
        //return auth()->user()->permissions;




        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('lessons', $user->lessons);
    }
}
