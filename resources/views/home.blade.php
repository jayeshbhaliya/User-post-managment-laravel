@extends('Master.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div>
                @if($post->post_icon)
                <img src="{{ asset('storage/'.$post->post_icon) }}" width="400" height="300">
                @else
                {{-- <img src="{{ asset('no_image.jpg') }}" width="100" height="100"> --}}
                @endif
                <h1>{{$post->title}}</h1>
                <p>{{$post->desc}}</p>
                <p>Uploaded by: {{$post->user->name}}</p>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
