@extends('layouts/master')

@section('title', 'Home Page')

@section('content')
@foreach($posts as $post)
<div class="card mb-5 mt-5"> 
<a href="posts/{{$post->id}}"><h3 class="card-title text-center">{{$post -> title}} </h3></a>
<p class="ms-5"> {{$post-> body}}</p>
<div class="card-footer d-flex justify-content-between"> 
<a href="/posts/{{$post->id}}/edit" class="btn btn-success me-3"> Edit </a> 
<form action="/posts/{{$post->id}}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to delete')"> Delete </button>
</form>
</div>
</div>
@endforeach

@endsection
     
    