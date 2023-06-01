<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
        //validating
        $this->validate($request,[
            'comment'=>'required|max:255'
        ]);

        //storing the result
        Comentario::create([
            'user_id'=>auth()->user()->id,
            'post_id'=>$post->id,
            'comment'=>$request->comment
        ]);

        //printing message
        return back()->with('message', 'Comment registered successfully');
    }
}
