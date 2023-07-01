@extends('layout.otherMaster')

@section('title')
    <title>login </title>
@endsection

@section('header-style')
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
@endsection

@section('content')
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('auth/images/signin-image.jpg') }}" alt="sing up image"></figure>
                        <a href="/register" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">login</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{ route('login') }}">
                            <div class="form-group">
                                <label for="your_name"><i class="fa-solid fa-user"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name" />
                                @error('your_name')
                                    <span class="alert alert-danger" role="alert">{{ $message }}</span>
                                @enderror
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
                                @error('pass')
                                    <span class="alert alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                                @error('remember-me')
                                    <span class="alert alert-danger" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        {{-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> --}}
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
    <script src="{{ asset('auth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/main.js') }}"></script>
@endsection
