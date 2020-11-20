@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Success or error messages -->
    @if( Session::has( 'success' ))
    <div class="row ">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                {{ Session::get( 'success' ) }}
            </div>
        </div>
    </div>
    @elseif( Session::has( 'warning' ))
    <div class="row ">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                {{ Session::get( 'warning' ) }}
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

                <div class="col-md-8 user-edit-form-container">
                    <form method="POST" action="{{url('user-update')}}" id="create-user-form">
                        @csrf

                        <input type="hidden" name="id" value="{{$user->id}}">

                        <div class="form-group required">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="@if(old('name')){{old('name')}}@else{{$user->name}}@endif" required
                                autocomplete="name" autofocus maxlength="30">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group required">
                            <label for="surname">Surname</label>
                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                                name="surname"
                                value="@if(old('surname')){{old('surname')}}@else{{$user->surname}}@endif" required
                                autocomplete="surname" autofocus maxlength="30">

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group required">
                            <label for="username">Username</label>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="@if(old('username')){{old('username')}}@else{{$user->username}}@endif" required
                                autocomplete="username" autofocus maxlength="30">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group required">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="@if(old('email')){{old('email')}}@else{{$user->email}}@endif"
                                required autocomplete="email" maxlength="50" disabled>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group required">
                            <label for="mobile">Mobile Number</label>
                            <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror"
                                name="mobile" value="@if(old('mobile')){{old('mobile')}}@else{{$user->mobile}}@endif"
                                required autocomplete="mobile" autofocus minlength="10" maxlength="15" pattern="[0-9]+"
                                title="Please enter a phone number">

                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group required">
                            <label for="job_title">Job Title</label>
                            <input id="job_title" type="text"
                                class="form-control @error('job_title') is-invalid @enderror" name="job_title"
                                value="@if(old('job_title')){{old('job_title')}}@else{{$user->job_title}}@endif"
                                required autocomplete="job_title" autofocus maxlength="100">

                            @error('job_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea id="bio" type="text" class="form-control @error('bio') is-invalid @enderror"
                                name="bio" autocomplete="bio"
                                style="white-space: normal">@if(old('bio')){{old('bio')}}@else{{$user->bio}}@endif</textarea>

                            @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-scout-main" data-toggle="modal"
                            data-target="#newUserModal">
                            Save&nbsp; <i class="fa fa-save"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>




@endsection
