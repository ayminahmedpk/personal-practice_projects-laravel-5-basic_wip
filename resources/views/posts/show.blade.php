

@extends('layouts.app')


@section('title')
  Post
@endsection

@section('content')

  <h1>{{$post->title}}</h1>
  <small>Written on: {{$post->created_at}} by {{$post->user->name}}</small>

  <div>
    {!!$post->body!!}
  </div>

  <br><br>

  @if(!Auth::guest())
    @if (Auth::user()->id == $post->user_id)
        
      <button>
        <a href="/laravel_test/public/posts/{{$post->id}}/edit">Edit</a>
      </button>

      <form action="{{ action('PostsController@destroy', [$post->id] ) }}" method="post">
        <input type="submit" value="Delete">
        {{csrf_field()}}
        {{method_field('DELETE')}}
      </form>

    @endif
  @endif


  </form>

@endsection