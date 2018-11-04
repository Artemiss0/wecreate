<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index(Request $request)
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

        return view('pages.index')
            ->with('projects', $projects)
            ->with('title', $title)
            ->with('tags', $tags);
    }

    public function profile()
    {
        $title = 'Profile';
        return view('pages.profile')
            ->with('title', $title);
    }
}
