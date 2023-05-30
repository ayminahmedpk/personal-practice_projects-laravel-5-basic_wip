

@extends('layouts.app')


@section('title')
  Post
@endsection

@section('content')

  <form action="{{ action('PostsController@store') }}" method="post" enctype="multipart/form-data">

    <br><br>
    
    <div>
      <label for="title">Title</label>
      <input type="text" name="title">
    </div>
    
    <br><br>
    
    <div>
      <label for="body">Body</label>
      <textarea name="body"></textarea>
    </div>

    <br><br>

    <label for="image_input">Upload image:</label>
    <input type="file" name="cover_image" id="image_input">

    <br><br>
    
    {{ csrf_field() }}

    {{-- {{ method_field('PUT') }} --}}

    <input type="submit" value="Post">

  </form>


@endsection