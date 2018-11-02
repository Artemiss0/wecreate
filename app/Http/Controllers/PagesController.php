<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['discover', 'index']]);
    }

    public function index()
    {
        $title = 'Homepage';
        return view('pages.index', compact('title'));
    }

    public function profile()
    {
        $title = 'Profile';
        return view('pages.profile', compact('title'));
    }

    public function discover(Request $request)
    {
        $tags = Tag::all();
        $projects = Project::all();
        $title = 'discover';

        if ($request->has('tags')){
            $tagId = $request->get('tags');
            $projects = DB::table('tags')
                ->select('projects.id','projects.image','projects.title','projects.text')
                ->join('project_tag','tags.id','=','project_tag.tag_id')
                ->join('projects', 'project_tag.project_id', '=', 'projects.id')
                ->where('tags.id' ,'=',$tagId)
                ->get();
        }

        return view('pages.discover')
            ->with('projects', $projects)
            ->with('title', $title)
            ->with('tags', $tags);
    }
}
