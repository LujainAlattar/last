@extends('layout.otherMaster')

@section('title')
    <title>sign up </title>
@endsection

@section('header-style')
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">

    <style>
        .form-error {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="sign_container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form"
                            action="{{ route('register-teacher') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="fa-solid fa-user"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" />
                                <p id="name-error" class="form-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fa-solid fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                                <p id="email-error" class="form-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="fa-solid fa-phone"></i></label>
                                <input type="phone" name="phone" id="phone" placeholder="Your Phone" />
                                <p id="phone-error" class="form-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="fa-solid fa-lock"></i></label>
                                <div style="position: relative;">
                                    <input type="password" name="pass" id="pass" placeholder="Password"
                                        style="padding-right: 30px;" />
                                    <span class="password-toggle" onclick="togglePasswordVisibility('pass')"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                                        <i class="fa-solid fa-eye"></i>
                                    </span>
                                </div>
                                <p id="pass-error" class="form-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="fa-solid fa-lock"></i></label>
                                <div style="position: relative;">
                                    <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"
                                        style="padding-right: 30px;" />
                                    <span class="password-toggle" onclick="togglePasswordVisibility('re_pass')"
                                        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                                        <i class="fa-solid fa-eye"></i>
                                    </span>
                                </div>
                                <p id="re-pass-error" class="form-error"></p>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                                <p id="agree-term-error" class="form-error"></p>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('auth/images/signup-image.jpg') }}" alt="sing up image"></figure>
                        <a href="/login" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('register-form');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');
            const passInput = document.getElementById('pass');
            const rePassInput = document.getElementById('re_pass');
            const agreeTermCheckbox = document.getElementById('agree-term');

            form.addEventListener('submit', function(event) {
                let valid = true;

                // Reset error messages
                document.querySelectorAll('.form-error').forEach(function(errorElement) {
                    errorElement.textContent = '';
                });

                // Validate name
                if (nameInput.value.trim() === '') {
                    valid = false;
                    document.getElementById('name-error').textContent = 'Name is required';
                }

                // Validate email
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(emailInput.value)) {
                    valid = false;
                    document.getElementById('email-error').textContent = 'Invalid email format';
                }

                // Validate phone number
                const phonePattern = /^07\d{8}$/;
                if (phoneInput.value.trim() === '') {
                    valid = false;
                    document.getElementById('phone-error').textContent = 'phone is required';
                } else if (!phonePattern.test(phoneInput.value)) {
                    valid = false;
                    document.getElementById('phone-error').textContent =
                        'Invalid phone number format (should start with 07 and have 10 digits)';
                }

                // Validate password
                if (passInput.value.trim() === '') {
                    valid = false;
                    document.getElementById('pass-error').textContent = 'Password is required';
                }

                // Validate password match
                if (rePassInput.value !== passInput.value) {
                    valid = false;
                    document.getElementById('re-pass-error').textContent = 'Passwords do not match';
                }

                // Validate agree-term checkbox
                if (!agreeTermCheckbox.checked) {
                    valid = false;
                    document.getElementById('agree-term-error').textContent = 'You must agree to the terms';
                }

                if (!valid) {
                    event.preventDefault();
                }
            });
        });
    </script>


    <script src="{{ asset('auth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/main.js') }}"></script>
@endsection
