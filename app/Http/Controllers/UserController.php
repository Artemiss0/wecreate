<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
        $users = User::find($id);

        //check for correct user
        if(auth()->user()->id !== $users->id){
            return redirect('/profile')->with('error', 'Unauthorized page');
        }
        return view('user.edit')
            ->with('users',$users);

    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);


        //create project
        $user = User::find($id);

        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->about = $request->input('about');
        $user->occupation = $request->input('occupation');
        $user->website = $request->input('website');

        $user->save();

        return redirect('/profile')->with('success', 'User information updated');

    }

}
