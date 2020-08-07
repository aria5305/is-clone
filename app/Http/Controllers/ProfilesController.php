<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index(\App\User $user)
    {
        // dd($user);//echo then stops all operation
        // $user = \App\User::findorFail($user); //finding the user with that username -> returns ID
        // return view('profile.index', ['user'=> $user,]);
        return view('profile.index', compact('user'));
    }

    public function edit(\App\User $user)
    {

        return view('profile.edit', compact('user'));
    }

}
