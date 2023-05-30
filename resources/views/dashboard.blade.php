@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

                @if(count($posts) > 0)
                    @foreach ($posts as $post)
                        <h1>{{$post->title}}</h1>
                        <div>
                            {!!$post->body!!}
                        </div>
                        <br><br>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
