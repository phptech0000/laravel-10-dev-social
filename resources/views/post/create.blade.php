@extends('layouts.app')
@section('titulo')
    Create a New Post
@endsection
@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            image here
        </div>
        <div class="md:w-1/2 p-10  bg-white rounded-lg shadow-xl mt-10 m:mt-0">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                        Title
                    </label>
                    <input 
                        id="title" 
                        name="title" 
                        type="text" 
                        placeholder="Post title" 
                        class="border p-3 w-full rounded-lg @error('title') border-red-500 @enderror"
                        value={{ old('title') }}
                    >
                    @error("title")
                        <p class=" bg-red-500 text-white my-0 rounded-md p-2 text-sm text-center">{{$message}}</p>                        
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Description
                    </label>
                    <textarea 
                        id="description" 
                        name="description"                        
                        placeholder="Post description" 
                        class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror"
                        
                    >{{ old('description') }}</textarea>
                    @error("description")
                        <p class=" bg-red-500 text-white my-0 rounded-md p-2 text-sm text-center">{{$message}}</p>                        
                    @enderror
                </div>
                <input type="submit" value="Create Post" class="bg-sky-600  hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form> 
        </div>
    </div>
@endsection