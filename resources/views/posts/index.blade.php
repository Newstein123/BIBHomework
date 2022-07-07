@extends('layouts/master')

@section('title', 'Home Page')

@section('content')
<style>
  body {
    background-color: #f2f2f2;
  }
  a:hover {
    color: red;
  }
  a {
    color: grey;
  }
</style>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show w-50" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

 

    {{-- Post  --}}

  <div class="row">
    <div class="col-8">
      @if(count($posts)== 0)
      <div class="text-danger">what the fuck are you searching</div>
      @else 
      @foreach($posts as $post)
      <div class="card mt-3">
        <img src="https://picfiles.alphacoders.com/294/thumb-1920-294609.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">
             <a href="posts/{{$post->id}}" class="text-decoration-none">
            <h3 class=" text-left">{{$post -> title}} </h3>
          </a>
        <span><i class="bi bi-calendar2-minus-fill"></i> {{$post -> created_at->toFormattedDateString()}} by <b>
          <i class="bi bi-person-circle"></i>{{$post->user->name}}</b> </span> 
        </h5>
          <p class="card-text text-muted">  {{$post-> body}}</p>
          <div class="d-flex justify-content-between">
            @if($post->isOwn())
            <div class="d-flex justify-content-between"> 
            <a href="/posts/{{$post->id}}/edit" class="btn btn-success me-3"> Edit </a> 
            <form action="/posts/{{$post->id}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure to delete')"> Delete </button>
            </form>
            </div>
            @endif
           <div> <a href="#" class="btn btn-primary text-uppercase"> Read More</a> </div> 
          </div>
         
        </div>
      </div>
      @endforeach
      @endif
    </div>

    {{-- Side Bar  --}}

    <div class="col-4">
      <div class="card card-body">
         {{-- search  --}}

  <nav class="navbar navbar-expand-lg bg-white">
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
      </div>
     <div class="card card-body border-none bg-white mt-5">
      <h5 class="mt-3 mb-5"> Rescent Posts  </h5>
      <ul class="list-group list-group-flush text-muted">
        @foreach($posts as $post)
        <div class="row mt-2">
          <div class="col-4">
            <img src="https://picfiles.alphacoders.com/294/thumb-1920-294609.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-8">
            <p> {{$post->title}} </p>
            <span> Jun 17, 2020 </span>
          </div>
        </div>
        @endforeach
      </ul>
     </div>
   
    <div class="card card-body mt-5 bg-white">
      <h5 class="mb-3"> CATEGORIES </h5>
      <ul class="list-group list-group-flush text-muted">
        @foreach(range(1,5) as $category)
        <li class="list-group-item d-flex justify-content-between">
         <a href="#" class="text-decoration-none"><div> Category1 </div><span> 10 </span></a> 
        </li>
        @endforeach
      </ul>
     </div>
    </div>
  </div>
</div>
  
  
   


   
   

{{$posts->links()}}
@endsection
     
    