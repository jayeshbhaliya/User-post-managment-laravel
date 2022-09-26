@extends('Master.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
<div class="container">


    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 ">
                @foreach ($user as $user)

                <div class="col col-10 ">
                    <div class="card">
                        <div class="rounded-top bg-secondary text-white d-flex flex-row"
                            style=" height:200px;">
                            <div class="img h-100 w-20" style="height:200px;">
                                @if ($user->UserProfile != null)

                                <img src="./images/{{$user->UserProfile->profile_photo}}"
                                    alt="Generic placeholder image" class="img-fluid h-100 w-100 img-thumbnail "
                                    width="100px" height="250px">
                                @else

                                @endif
                            </div>
                            <div class="ms-3 p-2" style="margin-top: 130px;">
                                <h5>{{$user->name}}</h5>
                                <p>{{$user->email}}</p>
                            </div>
                        </div>

                        <div class="card-body p-4 text-black">
                            <div class="mb-5">
                                <p class="lead fw-normal mb-1">Aboute</p>
                                @if ($user->UserProfile != null)
                                <div class="p-4" style="background-color: #f8f9fa;">
                                    <p class="font-italic mb-1">Date of Birth : {{$user->UserProfile->birth_date}}</p>
                                    <p class="font-italic mb-1">Address : {{$user->UserProfile->address}}</p>
                                    <p class="font-italic mb-0">Gender : {{$user->UserProfile->gender}}</p>
                                </div>
                                @else
                                <div class="p-4" style="background-color: #f8f9fa;">
                                    <p class="font-italic mb-1">Date of Birth : -</p>
                                    <p class="font-italic mb-1">Address : - </p>
                                    <p class="font-italic mb-1">Gender : -</p>
                                    <p class="font-italic font-red mb-1">Edit profile to add this details</p>
                                </div>
                                @endif
                            </div>


                        </div>
                    </div>

                </div>
                @endforeach

            </div>
            <div class="row d-flex justify-content-center align-items-center h-100  p-3" >
                <a href="{{ url('/add-profile', Auth::user()->id) }}" class="btn btn-outline-dark"
                    data-mdb-ripple-color="dark" style="z-index: 1;">Edit profile</a>
            </div>
        </div>
    </section>

</div>
@endsection
