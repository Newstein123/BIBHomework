@extends('layouts/master')

@section('title', $post->title)

@section('content')


<div class="row">
    <div class="col-4">
        <div class="card"> 
            <div class="card-header"><h1> Post Details </h1></div>
            <div class="card-body">
        <h3> {{$post ->title}} </h3>
        <p> {{$post ->body}} </p>
        </div>
        <a href="/Posts" class="btn btn-primary"> Home Page </a>
        </div>
    </div>
</div>

@endsection