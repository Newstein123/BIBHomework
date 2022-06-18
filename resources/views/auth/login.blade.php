
@extends('layouts/auth')
@section('title', 'Login Page')

@section('content')
    <div class="container ">
       <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-6 ">
            <div class="card">
                <div class="card-header"> Login  </div>
            <form action="login" method="POST">
                @csrf
                <label for="email"> Email </label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                <br>
                @error('email')
                <div class="text-danger"> {{$message}}</div>
                @enderror
                <label for="password"> Password </label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                <br>
                @error('password')
                <div class="text-danger"> {{$message}} </div>
                @enderror
                <div class="d-flex justify-content-between"> 
                <button type="submit" class="btn btn-primary"> Login  </button>
                <a href="posts" class="btn btn-success"> Back </a>
            </div>

            </form>
        </div>
        </div>
       </div>
    </div>
    @endsection
