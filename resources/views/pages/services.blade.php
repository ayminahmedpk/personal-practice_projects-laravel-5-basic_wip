

@extends('layouts.app')

@section('title')
  {{config('app.name', 'fallback') . $titleSuffix}}
@endsection


@section('content')
  
  <h1>Services offered:</h1>

  @if (count($services) > 0)
    <ul>
      @foreach ($services as $service)
        <li>{{$service}}</li>
      @endforeach
    </ul>
  @endif

@endsection