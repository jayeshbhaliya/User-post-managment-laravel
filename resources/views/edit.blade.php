@extends('Master.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile Details</div>

                @foreach ($user as $user)

                <div class="card-body">
                    @if ($user->UserProfile != null)
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data" name="profile_form" id="form">
                    @else
                    <form action="{{ route('profile.save') }}" method="post" enctype="multipart/form-data" name="profile_form" id="form">
                    @endif
                        @csrf
                        <div class="mb-3">
                            <input type="user_id" class="form-control" id="user_id" value="{{ $user->id }}"
                                name="user_id" hidden>
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="@if($user->UserProfile != null){{$user->UserProfile->birth_date}}@endif">
                                <span style="color: red">@error('birth_date'){{$message}}@enderror</span>

                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value=" @if ($user->UserProfile != null){{$user->UserProfile->address}} @endif">
                                <span style="color: red">@error('address'){{$message}}@enderror</span>

                        </div>

                        <div class="mb-3">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-select form-select-sm">
                                <option value="male"  @if ($user->UserProfile != null) {{ ( $user->UserProfile->gender == 'male' ) ? 'selected' : '' }} @endif >Male</option>
                                <option value="female"  @if ($user->UserProfile != null){{ ( $user->UserProfile->gender == 'female' ) ? 'selected' : '' }} @endif >Female</option>
                            </select>

                        </div>

                        <div class="input-group mb-3">
                            <label for="profile_photo">Upload Profile Photo :</label>
                            <input type="file" name="profile_photo" id="profile_photo" name="profile_photo" require>
                            <span style="color: red">@error('profile_photo'){{$message}}@enderror</span>
                            @if ($user->UserProfile != null)
                            <img src="/images/{{$user->UserProfile->profile_photo}}"
                                    alt="Generic placeholder image"
                                    width="200px" height="150px">
                                @endif
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>

                @endforeach


            </div>
        </div>
    </div>
</div>
@endsection
