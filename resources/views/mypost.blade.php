@extends('Master.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
@if ($message = Session::get('massage'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong></strong>Successfully.
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="p-4">
                @if($post->post_icon)
                <img src="{{ asset('storage/'.$post->post_icon) }}" width="400" height="300">
                @else
                {{-- <img src="{{ asset('no_image.jpg') }}" width="100" height="100"> --}}
                @endif
                <h1>{{$post->title}}</h1>
                <p>{{$post->desc}}</p>
                <a href="{{url('/edit-post/'.$post->id)}}" class="btn btn-outline-dark" >Edit</a>
                <a href="{{url('/delete-post/'.$post->id)}}" class="btn btn-outline-dark" >Delete</a>

            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
