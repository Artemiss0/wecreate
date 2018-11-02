<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
use App\Tag;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    //you can only continue if you are authenticated
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $projects = Project::where("user_id","=", $user->id)->get();
        $title = 'Projects';

        return view('pages.profile')
            ->with('projects',$projects)
            ->with('title', $title);

    }
    /**
     * Favorite a particular post
     *
     * @param  Project $project
     * @return Response
     */
    public function favoriteProject(Project $project)
    {
        Auth::user()->favorites()->attach($project->id);

        return back();
    }

    /**
     * Unfavorite a particular post
     *
     * @param  Project $project
     * @return Response
     */
    public function unFavoriteProject(Project $project)
    {
        Auth::user()->favorites()->detach($project->id);

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $user = User::all();
        return view('projects.create')
            ->with('tags',$tags)
            ->with('users', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //die and dump
//        dd($request);

        $this->validate($request, [
            'title' => 'required|max:100',
            'text' => 'required',
            'image' => 'image|required|max:1999',
            'tags' => 'nullable'
        ]);
        //handle file upload
        if($request->hasFile('image')){
            //get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extension
            $exstension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $exstension;
            //upload image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        //create project
        $project = new project;
        $project->title = $request->input('title');
        $project->text = $request->input('text');
        $project->image = $fileNameToStore;
        $project->user_id = auth()->user()->id;
        $project->save();

        $project->tags()->sync($request->tags, false); // the content will be assosiated with this project
        $project->user()->sync($request->users, false);

        return redirect('/projects')->with('success', 'Post Created');
    }
    public function likeProject(Project $project){
        Auth::user()->likes()->attach($project->id);
        return back();
    }
    public function dislikeProject(Project $project){
        Auth::user()->likes()->detach($project->id);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::all();
        $users = User::all();
        $project = Project::find($id);
//        $project = Project::where('user_id','=',$id)->get();
        return view('projects.show')
            ->with('project', $project)
            ->with('tags', $tags)
            ->with('user',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        //check for correct user
        if(auth()->user()->id !== $project->user_id){
            return redirect('/projects')->with('error', 'Unauthorized page');
        }
        return view('projects.edit')->with('project', $project);
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
        $this->validate($request, [
            'title' => 'required|max:100',
            'text' => 'required',
            'image' => 'image'
        ]);

        if($request->hasFile('image')){
            //get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extension
            $exstension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $exstension;
            //upload image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }

        //create project
        $project = project::find($id);
        if($request->hasFile('image')){
            $project->image = $fileNameToStore;
        }
        $project->title = $request->input('title');
        $project->text = $request->input('text');

        $project->save();
        return redirect('/projects')->with('success', 'Project updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        //check for correct user
        if (auth()->user()->id !== $project->user_id){
            return redirect('/projects')->with('error','Authorization Error');
        }
        if ($project->image != 'noImage.jpg'){
            //delete image
            Storage::delete('public/images/'.$project->image);
        }

        //check for correct user
        if(auth()->user()->id !== $project->user_id){
            return redirect('/projects')->with('error', 'Unauthorized page');
        }

        $project->delete();
        return redirect('/projects')->with('success', 'Project Removed');
    }
}
