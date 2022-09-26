@extends('Master.master')
@section('title')
<title>Create Post</title>
@endsection
@section('content')
<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>



                    <div class="card-body">
                        <form action="{{ route('post.update') }}" method="post" enctype="multipart/form-data" name="post_form" id="form">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="user_id" name="user_id" value="{{$posts->user->id}}" hidden>
                                <input type="text" class="form-control" id="id" name="id" value="{{$posts->id}}" hidden>
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$posts->title}}">
                                <span style="color: red">@error('title'){{$message}}@enderror</span>

                            </div>

                            <div class="mb-3">
                                <label for="desc" class="form-label">Post Description</label>
                                <textarea name="desc" id="desc" class="form-control" cols="30" rows="4" >{{$posts->desc}}</textarea>
                                <span style="color: red">@error('desc'){{$message}}@enderror</span>

                            </div>
                            <div class="input-group mb-3">
                                <label for="post_icon">Upload Post Icon :</label>
                                <input type="file" name="post_icon" id="post_icon" name="post_icon" >
                                <span style="color: red">@error('post_icon'){{$message}}@enderror</span>
                                <img src="{{ asset('storage/'.$posts->post_icon) }}" width="150" height="100">

                            </div>

                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
