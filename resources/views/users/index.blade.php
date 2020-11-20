@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users</h4> <button type="button" class="btn btn-primary btn-dark">
                        <a href="">Add New</a>
                    </button>
                </div>

                <table class="table table-hover table-dark">
                    <thead>
                        <tr>

                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>

                            <td>
                                <h5>{{$user->name}}</h5>
                            </td>

                            <td>
                                <button type="button" class="btn btn-success btn-light"><a
                                        href="{{ route('edit-view', ['id' => $user->id]) }}">Edit</a></button>
                                <button type="button" class="btn btn-danger btn-dark"><a
                                        onclick="return confirm('Are you sure youw ant to delete {{$user->name}}?')"
                                        href="{{ route('destroy', ['id' => $user->id]) }}">Delete</a></button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
