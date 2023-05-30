

@extends('layouts.app')

@section('title')
  {{config('app.name', 'fallback') . $titleSuffix}}
@endsection


@section('content')
  <h1>"Laravel From Scratch" - Home page</h1>
@endsection