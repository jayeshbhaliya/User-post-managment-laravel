@extends('Master.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Profile Details</div>

                <div class="card-body">
                    <form action="{{ route('profile.save') }}" method="post" enctype="multipart/form-data" name="profile_form" id="form">
                        @csrf
                        <div class="mb-3">
                            <input type="user_id" class="form-control" id="user_id" value="{{$user_id}}" name="user_id" hidden>
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date">

                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address">

                        </div>

                        <div class="mb-3">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-select form-select-sm">
                                <option value="male" selected>Male</option>
                                <option value="female" selected>Female</option>
                            </select>

                        </div>

                        <div class="input-group mb-3">
                            <label for="profile_photo">Upload Profile Photo :</label>
                            <input type="file" name="profile_photo" id="profile_photo" name="profile_photo" require>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
