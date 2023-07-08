@extends('layout.adminMaster')

@section('title')
    <title>user edit</title>
@endsection

@section('header-style')
@endsection


@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">update user</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            <form action="{{ route('user-dashboard.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" value="{{ $user->id }}" id="id" />

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                                name="name" placeholder="Name" aria-label="Name"
                                                aria-describedby="basic-icon-default-fullname2"
                                                value="{{ $user->name }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-age">Birthday</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"></span>
                                            <input type="date" id="basic-icon-default-age" class="form-control"
                                                name="birthday" placeholder="Age" aria-label="Age"
                                                aria-describedby="basic-icon-default-Age" value="{{ $user->birthday }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                            <input type="text" id="basic-icon-default-email" class="form-control"
                                                name="email" placeholder="email@email.com" aria-label="email@email.com"
                                                aria-describedby="basic-icon-default-email2" value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone No</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                    class="bx bx-phone"></i></span>
                                            <input type="text" id="basic-icon-default-phone" name="phone"
                                                class="form-control phone-mask" placeholder="07 **** ****"
                                                aria-label="07 **** ****" aria-describedby="basic-icon-default-phone2"
                                                value="{{ $user->phone }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Location</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-location" class="input-group-text"><i
                                                    class="fa-solid fa-location-dot"></i></span>
                                            <input type="text" id="basic-icon-default-location"
                                                class="form-control location-mask" placeholder="Location" name="location"
                                                aria-label="Location" aria-describedby="basic-icon-default-location"
                                                value="{{ $user->location }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-pass">Password</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge" style="position: relative;">
                                            <span id="basic-icon-default-location" class="password-toggle input-group-text"
                                                onclick="togglePasswordVisibility('pass')" style=" cursor: pointer;">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                            <input type="password" name="password" id="pass" class="form-control"
                                                placeholder="Password" style="padding-right: 30px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-repass">Re-enter
                                        Password</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge" style="position: relative;">
                                            <span id="basic-icon-default-location"
                                                class="repassword-toggle input-group-text"
                                                onclick="togglePasswordVisibility('repass')" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                            <input type="password" name="repassword" id="repass" class="form-control"
                                                placeholder="Re-enter Password" style="padding-right: 30px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                        <a href="{{ route('user-dashboard.index') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
@endsection

@section('script-content')
    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var passwordToggle = document.querySelector(`[onclick="togglePasswordVisibility('${inputId}')"] i`);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.classList.remove('fa-eye');
                passwordToggle.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordToggle.classList.remove('fa-eye-slash');
                passwordToggle.classList.add('fa-eye');
            }
        }
    </script>
    <script src="{{ asset('auth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/main.js') }}"></script>
@endsection
