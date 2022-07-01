@extends ('layouts/master');

@section('title', 'Category Home Page')

@section('content')
<h1 class="text-white text-center mb-3"> Create A Category </h1>

<form action="/categories/{{$category->id}}" method="POST">
@csrf
@method('PUT')
    <label for="" class="text-dark"> Category Title </label>
    <input type="text" name="name" id="" class="form-control text-primary" value="{{$category->name}}">
    <br>
    <br> <br>
    <label for="" class="text-dark"> Description </label>
    <textarea name="body" id="" cols="10" rows="10" class="form-control text-primary"></textarea>
    <br>
    <br> 
    <button type="submit" class="form-control mb-5 w-25 border rounded bg-outline-success"> Update </button>
</form>
@endsection
