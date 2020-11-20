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
                            <th scope="col">Image</th>
                            <th scope="col">URL</th>

                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
