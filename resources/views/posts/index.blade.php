@extends('layouts/master')

@section('title', 'Home Page')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show w-50" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

@foreach($posts as $post)
<div class="card mb-5 mt-5"> 
    <div class="card-header"> 
<a href="posts/{{$post->id}}"><h3 class=" text-center">{{$post -> title}} </h3></a>
Created at {{$post -> created_at->diffforHumans()}} by {{$post->user_id}}
{{$post->user_id}}
Updated at {{$post -> updated_at->diffforHumans()}}
</div>
<p class="ms-5"> {{$post-> body}}</p>
@auth
<div class="card-footer d-flex justify-content-between"> 
<a href="/posts/{{$post->id}}/edit" class="btn btn-success me-3"> Edit </a> 
<form action="/posts/{{$post->id}}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to delete')"> Delete </button>
</form>
</div>
@endauth
</div>
@endforeach
{{$posts->links()}}
@endsection
     
    