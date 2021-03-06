

@extends('layouts/master')

@section('title', 'Create Page')
    

@section('content')
<h1 class="text-white text-center mb-3"> Create A Post </h1>

<form action="/posts" method="POST">
@csrf
    <label for="" class="text-dark"> Post Title </label>
    <input type="text" name="title" id="" class="form-control text-primary">
    <br>
    @error('title')
    <div style="color: red"> {{$message }}</div>
    @enderror
    <br> <br>
    <label for="" class="text-dark"> Post Body </label>
    <textarea name="body" id="" cols="10" rows="10" class="form-control text-primary"></textarea>
    <br>
    <div class="container">
        <select class="form-select" aria-label="Default select example">
            <option selected> Select Category </option>
            {{-- @foreach ($categories as $category)
            <option value="{{$category->id}}"> {{$category->category}}</option>   
            @endforeach --}}

            @foreach($posts as $post)
            <option value="{{$post->id}}"> {{$post->title}}</option>   
            @endforeach
          </select>
    </div>
    @error('body')
    <div style="color: red"> {{$message }}</div>
    @enderror
    <br> 
    <button type="submit" class="form-control mb-5 w-25 border rounded bg-outline-success"> Create </button>
</form>
@endsection
