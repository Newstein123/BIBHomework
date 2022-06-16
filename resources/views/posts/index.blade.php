<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light text-center">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> Home Page  </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="/posts/create"> Create a post </a>
             
            </div>
          </div>
        </div>
      </nav>
      @foreach($posts as $post)
    <div class="container">
        <div class="card mb-5 mt-5"> 
        <h3 class="card-title text-center">{{$post -> title}} </h3>
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
    </div>
    @endforeach