<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('/auth.register');
    }
    public function store(Request $request)
    {

        //modificando el request[username] para validarlo después de su transformación
        $request->request->add(["username" => Str::slug($request->username)]);
        
        $this->validate($request,[
            "name"=>'required|max:30',
            "username"=>'required|unique:users|min:3|max:20',
            "email"=>'required|email|unique:users|max:60',
            "password"=>'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password) 
        ]);
    }
}
