<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('admin.index');
    }
    public function projects(Request $request){
        $projects = Project::all();
        if ($request->has('search')){
            $search = $request->input('search');
            $projects = Project::where('title', 'LIKE', '%' . $search . '%')->get();
        }
        return view('admin.project')
            ->with('projects',$projects);
    }
}
