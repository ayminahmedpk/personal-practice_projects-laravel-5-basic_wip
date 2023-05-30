

@extends('layouts.app')


@section('title')
  Blog - Index
@endsection

@section('content')
    <h1>Posts</h1>

    @if(!Auth::guest())
      <button>
        <a href="/laravel_test/public/posts/create">New</a>
      </button>
    @endif


    @if(count($posts) > 0)

      @foreach ($posts as $post)
        <h3>
          <a href="/laravel_test/public/posts/{{$post->id}}">{{$post->title}}</a>
        </h3>
        <small>Written on: {{$post->created_at}} by {{$post->user->name}}</small>
        <br><br>
      @endforeach

    {{-- To implement pagination --}}
    {{-- {{$posts->links()}} --}}

    @else

      <p>No posts found</p>

    @endif
@endsection