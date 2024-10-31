@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>External Posts</h1>

        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['body'] }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>לא נמצאו פוסטים להצגה.</p>
        @endif
    </div>
@endsection