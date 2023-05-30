

@extends('layouts.app')


@section('title')
  Upload test
@endsection

@section('content')

  <p>Upload test form page</p>

  
  {{-- <form action="/laravel_test/public/receiveImage" method="post" enctype="multipart/form-data"> --}}
  {{-- <form action="{{ action('PostsController@show') }}" method="get"> --}}
  <form action="{{ action('PagesController@receiveImage') }}" method="post" enctype="multipart/form-data">

    <input type="file" name='cover_image'>
    
    {{ csrf_field() }}

    <input type="submit" value="Post">

  </form>


@endsection