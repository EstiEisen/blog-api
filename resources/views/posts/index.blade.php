@extends('layouts.app')

@section('content')
    <div class="container">
<div class="m-auto text-center">
    <div class="py-15">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>

@if (session()->has('message'))
    <div class="m-auto mt-10 pl-2">
        <p class="py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check())
    <div class="m-auto">
        <a 
            href="/posts/create"
            class="btn btn-primary">
            Create post
        </a>
    </div>
@endif

@foreach ($posts as $post)
                <div class="card my-3">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post['title'] }}</h3>
                        <h5 class="card-title">{{ $post['publication_date'] }}</h5>
                        <p class="card-text">{{ $post['content'] }}</p>
                    </div>
               
       
    @if (isset(Auth::user()->id))
                <span class="float-right">
                    <a 
                        href="/posts/{{ $post->id }}/edit">
                        Edit
                    </a>
                </span>

                <span class="float-right">
                     <form 
                        action="/posts/{{ $post->id }}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
             

                    </form>
                </span>
            @endif
            </div>
@endforeach
</div>
@endsection