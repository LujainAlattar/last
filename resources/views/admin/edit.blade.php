@extends('layout.adminMaster')

@section('title')
    <title>profile edit</title>
@endsection

@section('header-style')
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('admin/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/js/config.js') }}"></script>

    <style>
        .content-wrapper {
            margin-top: -100px;
        }
    </style>
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper mt-4">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Update Image</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            <form action="{{ route('update-admin-img', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="image">Image</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="{{ route('admin-profile') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Update Profile</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            <form action="{{ route('edit-admin-profile', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

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



                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="{{ route('admin-profile') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Update Password</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            <form action="{{ route('update-admin-password', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-pass">Password</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge" style="position: relative;">
                                            <span id="basic-icon-default-location"
                                                class="password-toggle input-group-text"
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
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="{{ route('admin-profile') }}" class="btn btn-primary">Back</a>
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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection
