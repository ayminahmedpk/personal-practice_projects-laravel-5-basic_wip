

@extends('layouts.app')

@section('title')
  {{config('app.name', 'fallback') . $titleSuffix}}
@endsection


@section('content')
  <h1>This is the About page</h1>
@endsection