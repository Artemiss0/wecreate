<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function index(){
        $title = 'Homepage';
        return view('pages.index', compact('title'));
    }
    public function profile(){
        $title = 'Profile';
        return view('pages.profile', compact('title'));
    }
}
