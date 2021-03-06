
@extends('layouts/master')

@section('title', 'Edit Page')

@section('content')

<h1 class="text-white text-center mb-3"> Edit A Post </h1>
<form action="/posts/{{$post->id}}" method="POST">
@csrf
@method('PUT')
    <label for="" class="text-white"> Post Title </label>
    <input type="text" name="title" id="" class="form-control bg-secondary" value="{{$post-> title}}">
    <br>
    @error('title')
    <div style="color: red"> {{$message }}</div>
    @enderror
    <br> <br>
    <label for="" class="text-white"> Post Body </label>
    <textarea name="body" id="" cols="10" rows="10" class="form-control bg-secondary">{{$post-> body}}</textarea>
    <br>
    @error('body')
    <div style="color: red"> {{$message }}</div>
    @enderror
    <br> 
    <button type="submit" class="form-control mb-5 w-25 border rounded bg-outline-success"> Create </button>
</form>
@endsection
    
