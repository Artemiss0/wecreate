<?php

namespace App\Http\Controllers;

use App\Project;
use App\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $title = 'Homepage';
        return view('admin.index')
            ->with('title', $title);

    }
    public function projects(Request $request){
        $projects = Project::all();
        $title = 'projects';
        if ($request->has('search')){
            $search = $request->input('search');
            $projects = Project::where('title', 'LIKE', '%' . $search . '%')->get();
        }
        return view('admin.project')
            ->with('projects',$projects)
            ->with('title',$title);
    }
}
