@extends('layouts.app')

@section("titulo")
    {{$post->title}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads')."/".$post->image}}" alt="Post image: {{$post->title}}">
            <div class="p-3">
                <p>0 likes</p>
            </div>
            <div>
                <p class="font-bold">{{$post->user->username}}</p>
                <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                <p>{{$post->description}}</p>
            </div>
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-xl font-bold text-center mb-4">Add a new comment</p>

                @if(session('message'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{session('message')}}
                    </div>                    
                @endif
                <form action="{{route('comentarios.store', ['user'=>$user,'post'=>$post])}}" method="POST">
                    @csrf
                    <div class="mb-5">
                    
                        
                        <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">
                            Add a comment
                        </label>
                        <textarea 
                            id="comment" 
                            name="comment"                        
                            placeholder="Add a comment" 
                            class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror"
                            
                        ></textarea>
                        @error("comment")
                            <p class=" bg-red-500 text-white my-0 rounded-md p-2 text-sm text-center">{{$message}}</p>                        
                        @enderror

                       
                    </div>
                    <input type="submit" value="Comment" class="bg-sky-600  hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>
                @endauth
            </div>
        </div>
    </div>
@endsection