

@extends('layouts.app')


@section('title')
  Edit Post
@endsection

@section('content')

{{-- <form action="" method="post"> --}}
  <form action="{{ action('PostsController@update', $post->id) }}" method="post">

    <br><br>
    
    <div>
      <label for="title">Title</label>
      <input type="text" name="title" value='{{$post->title}}'>
    </div>
    
    <br><br>
    
    <div>
      <label for="body">Body</label>
      {{-- <textarea name="body">{{$post->body}}</textarea> --}}
      <textarea name="body">{!!$post->body!!}</textarea>
    </div>

    <br><br>
    
    {{ csrf_field() }}

    {{ method_field('PUT') }}

    <input type="submit" value="Post">

  </form>


@endsection