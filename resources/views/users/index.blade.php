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

                    <div class="row">
                        <div class="col">
                            <h4 class="card-head-text">Users</h4>
                        </div>
                        <div class="col-auto justify-content-end">
                            <button type="button" class="btn btn-scout-main" data-toggle="modal"
                                data-target="#newUserModal">
                                Add New&nbsp; <i class="fa fa-user-o"> </i>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="table-responsive table-padding">
                    <table class="table table-hover table-btm-spacer" id="usersTable">

                        <thead class="thead-dark top-spacer">

                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Users loop -->
                            @foreach($users as $user)
                            <tr>
                                <th>{{$user->name}} {{$user->surname}}</th>
                                <td>{{$user->email}}</td>
                                <td>{{$user->mobile}}</td>
                                <td>
                                    <div class="action-btn-container float-right">
                                        <a class="white-text" href="{{ route('user_edit',['id' => $user->id]) }}"
                                            data-toggle="tooltip" title="Edit user">
                                            <button type="button" class="btn btn-scout-secondary action-btn">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        <a class="white-text" href="{{ route('user_destroy',['id' => $user->id]) }}">
                                            <button type="button" class="btn btn-scout-danger action-btn"
                                                onclick="return confirm('Are you sure youw ant to delete {{$user->name}} {{$user->surname}}?')"
                                                data-toggle="tooltip" title="Delete user">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- No users in table -->
                @if(count($users) == 0)
                <div class="row justify-content-center">
                    No users found
                </div>
                <br>
                @endif
            </div>

        </div>
    </div>
</div>
</div>

@include('modals\addUser')



@section('footer-scripts')
<script src="{{ asset('js/users.js') }}" defer></script>
<script type="text/javascript">
    @if (count($errors) > 0)
    window.onload = function() {
        $('#newUserModal').modal('show');
        $(document).ready(function() {
            $("body").tooltip({ selector: '[data-toggle=tooltip]' });
        });


    }
    @endif
</script>
@endsection




@endsection
