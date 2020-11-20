<!-- Modal -->
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enewUserModalLabel">Create new user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('user-create')}}" id="create-user-form"
                    oninput='password_confirmation.setCustomValidity(password_confirmation.value != password.value ? "Passwords do not match." : "")'>
                    @csrf

                    <div class=" form-group row required">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
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
                                name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus
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
                                value="{{ old('username') }}" required autocomplete="username" autofocus maxlength="30">

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
                                name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="50">

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
                                name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus
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
                                value="{{ old('job_title') }}" required autocomplete="job_title" autofocus
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
                                name="bio" autocomplete="bio" autofocus>{{ old('bio') }}</textarea>

                            @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row required">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right control-label">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" required="true"
                                class="form-control  @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" maxlength="60" minlength="8">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row required">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                            Password</label>
                        <div class="col-md-6">
                            <input id="password2" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" maxlength="60" minlength="8">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="create-user-form" class="btn btn-scout-main">Create</button>
            </div>
        </div>
    </div>
</div>
