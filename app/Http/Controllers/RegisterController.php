<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('/auth.register');
    }
    public function store(Request $request)
    {
        //dd($request);
        //dd($request->get("email"));
        $this->validate($request,[
            "name"=>'required|max:30',
            "username"=>'required|unique:users|min:3|max:20',
            "email"=>'required|email|unique:users|max:60',
            "password"=>'required'
        ]);
    }
}
