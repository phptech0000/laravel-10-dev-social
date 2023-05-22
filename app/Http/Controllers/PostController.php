<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $posts=Post::where('user_id',$user->id)->get();
       
        $data=[
            "user" =>$user,
            'posts' => $posts
        ];
       return view('dashboard',$data);
    }
    public function create()
    {
       return view('post.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>'required|max:255',
            'description' => 'required',
            'image' => 'required'
        ]);

        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$request->image,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('post.index',auth()->user()->username);
    }
}
