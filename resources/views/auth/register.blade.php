@extends('layouts/auth')
@section('title', 'Register Page')

@section('content')
<div class="container ">
    <div class="row justify-content-center vh-100 align-items-center">
     <div class="col-6 ">
         <div class="card">
             <div class="card-header"> register </div>
         <form action="register" method="POST">
             @csrf
             <label for="name"> Name </label>
             <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            
             @error('name')
                <div class="text-danger"> {{$message}}</div>
             @enderror
             <br>
             <label for="name"> Email </label>
             <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
             @error('email')
             <div class="text-danger"> {{$message}}</div>
          @enderror
          <br>
             <label for="password"> Password </label>
             <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
             @error('password')
             <div class="text-danger"> {{$message}}</div>
          @enderror
          <br>
             <div class="d-flex justify-content-between"> 
                <button type="submit" class="btn btn-primary"> Register </button>
                <a href="posts" class="btn btn-success"> Back </a>
            </div>
         </form>
     </div>
     </div>
    </div>
 </div>
@endsection