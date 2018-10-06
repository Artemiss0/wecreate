<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index(){
        return view('project.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required'
        ]);

        return 123;

        //create project
        $project = new Project;
        $project->title = $request->input('title');
    }
}
