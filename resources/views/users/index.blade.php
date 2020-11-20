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

                    <div class="row">
                        <div class="col">
                            <h4>Users</h4>
                        </div>
                        <div class="col-auto justify-content-end">
                            <button type="button" class="btn btn-scout-main" data-toggle="modal"
                                data-target="#newUserModal">
                                Add New
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
                                    <button type="button" class="btn btn-scout-secondary ">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-scout-danger "
                                        onclick="return confirm('Are you sure youw ant to delete {{$user->name}} {{$user->surname}}?')">

                                        <i class="fa fa-trash"></i>
                                    </button>
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
@endsection


<script type="text/javascript">
    @if (count($errors) > 0)
    window.onload = function() {
        $('#newUserModal').modal('show');
    }
    @endif
</script>

@endsection
