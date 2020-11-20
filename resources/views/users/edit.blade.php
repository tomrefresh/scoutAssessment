@extends('layouts.app')

@section('content')
<div class="container">

    @if(isset($successMessage))
    <div class="row ">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        </div>
    </div>
    @endif

    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-head-text">{{$user->name}}</h4>
                </div>

                <br><br>
                <form method="POST" action="{{url('add-new-user')}}" id="create-user-form"
                    oninput='password_confirmation.setCustomValidity(password_confirmation.value != password.value ? "Passwords do not match." : "")'>
                    @csrf

                    <div class=" form-group row required">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{$user->name}}" required autocomplete="name" autofocus
                                maxlength="30">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row required">
                        <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                        <div class="col-md-6">
                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                                name="surname" value="{{$user->surname}}" required autocomplete="surname" autofocus
                                maxlength="30">

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row required">
                        <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                        <div class="col-md-6">
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{$user->username}}" required autocomplete="username" autofocus maxlength="30">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row required">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{$user->email}}" required autocomplete="email" maxlength="50">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row required">
                        <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile Number</label>
                        <div class="col-md-6">
                            <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror"
                                name="mobile" value="{{$user->mobile}}" required autocomplete="mobile" autofocus
                                minlength="10" maxlength="15" pattern="[0-9]+" title="Please enter a phone number">

                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row required">
                        <label for="job_title" class="col-md-4 col-form-label text-md-right">Job Title</label>
                        <div class="col-md-6">
                            <input id="job_title" type="text"
                                class="form-control @error('job_title') is-invalid @enderror" name="job_title"
                                value="{{$user->job_title}}" required autocomplete="job_title" autofocus
                                maxlength="100">

                            @error('job_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>
                        <div class="col-md-6">
                            <textarea id="bio" type="text" class="form-control @error('bio') is-invalid @enderror"
                                name="bio" value="{{$user->bio}}" autocomplete="bio" autofocus>
                        </textarea>

                            @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>




                </form>
                <br><br>

            </div>
        </div>
    </div>
</div>
</div>




@endsection
