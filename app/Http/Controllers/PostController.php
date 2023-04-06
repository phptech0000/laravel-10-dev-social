<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        $data=[
            "user" =>$user
        ];
       return view('dashboard',$data);
    }
    public function create()
    {
        dd("Creando post...");
    }
}
