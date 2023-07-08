@extends('layout.adminMaster')

@section('title')
    <title>Create Teacher</title>
@endsection

@section('header-style')
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Create Teacher</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            <form method="POST" action="{{ route('teacher-dashboard.store') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text">
                                                <i class="bx bx-teacher"></i>
                                            </span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                                placeholder="Name" aria-label="Name" name="name"
                                                aria-describedby="basic-icon-default-fullname2" />
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-age">Birthday</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"></span>
                                            <input type="date" id="basic-icon-default-age" class="form-control"
                                                placeholder="Age" aria-label="Age" aria-describedby="basic-icon-default-Age"
                                                name="birthday" />
                                        </div>
                                        @error('birthday')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                            <input type="text" id="basic-icon-default-email" class="form-control"
                                                placeholder="email@example.com" aria-label="email@example.com"
                                                aria-describedby="basic-icon-default-email2" name="email" />
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone No</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text">
                                                <i class="bx bx-phone"></i>
                                            </span>
                                            <input type="text" id="basic-icon-default-phone"
                                                class="form-control phone-mask" placeholder="07 **** ****" name="phone"
                                                aria-label="07 **** ****" aria-describedby="basic-icon-default-phone2" />
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-location">Location</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-location" class="input-group-text">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                            <input type="text" id="basic-icon-default-location"
                                                class="form-control location-mask" placeholder="Location"
                                                aria-label="Location" aria-describedby="basic-icon-default-location"
                                                name="location" />
                                        </div>
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-location">Subject</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-subject" class="input-group-text">
                                                <i class="fa-solid fa-book"></i>
                                            </span>
                                            <select id="basic-icon-default-subject" class="form-control" name="subject">
                                                <option value="">Select a subject</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-price">Price / Hrs</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-price" class="input-group-text">
                                                <i class="fa-regular fa-money-bill-1"></i>
                                            </span>
                                            <input type="number" id="basic-icon-default-price"
                                                class="form-control price-mask" placeholder="Price" aria-label="Price"
                                                aria-describedby="basic-icon-default-price" name="price" />
                                        </div>
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-pass">Password</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge" style="position: relative;">
                                            <span id="basic-icon-default-location"
                                                class="password-toggle input-group-text"
                                                onclick="togglePasswordVisibility('pass')" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                            <input type="password" name="password" id="pass" class="form-control"
                                                placeholder="Password" style="padding-right: 30px;" />
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                                placeholder="Re-enter Password" style="padding-right: 30px;" />
                                        </div>
                                        @error('repassword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                                <a href="{{ route('teacher-dashboard.index') }}" class="btn btn-primary">Back</a>
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
