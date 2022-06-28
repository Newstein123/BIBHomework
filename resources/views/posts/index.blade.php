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
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
     
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" value ={{request('search')}}>
          <button class="btn btn-outline-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
            <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
            <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
          </svg></button>
        </form>
      </div>
    </nav>
    @if(count($posts)== 0)
    <div class="text-danger">what the fuck are you searching</div>
    @else 
   
    @foreach($posts as $post)
    <div class="card mb-5 mt-5"> 
        <div class="card-header"> 
    <a href="posts/{{$post->id}}"><h3 class=" text-center">{{$post -> title}} </h3></a>
    Created at {{$post -> created_at->diffforHumans()}} by <b>{{$post->user->name}}</b> 
    Updated at {{$post -> updated_at->diffforHumans()}}
    </div>
    <p class="ms-5"> {{$post-> body}}</p>
    @if($post->isOwn())
    <div class="card-footer d-flex justify-content-between"> 
    <a href="/posts/{{$post->id}}/edit" class="btn btn-success me-3"> Edit </a> 
    <form action="/posts/{{$post->id}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to delete')"> Delete </button>
    </form>
    </div>
    @endif
    </div>
    @endforeach
    @endif

{{$posts->links()}}
@endsection
     
    