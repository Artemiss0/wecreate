<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class PagesController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth',['except' => ['discover','index']]);
    }
    public function index(){
        $title = 'Homepage';
        return view('pages.index', compact('title'));
    }
    public function profile(){
        $title = 'Profile';
        return view('pages.profile', compact('title'));
    }
    public function discover(){
            $projects = Project::all();
            $title = 'discover';
            return view('pages.discover', compact('title'))->with('projects', $projects);
    }
}
