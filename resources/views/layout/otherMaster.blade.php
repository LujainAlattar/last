<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    @yield('title')



    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- progress barstle -->
    <link rel="stylesheet" href="{{ asset('home/css/css-circular-prog-bar.css') }}">
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font wesome stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    @yield('header-style')



</head>

<body>
    <div class="top_container sub_pages">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('home/images/logo.png') }}" alt="">
                        <span>
                            EduPro
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav  ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}"> Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('about') }}">About</a>
                                </li>

                                {{-- <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('teacher') }}"> Teacher </a>
                                </li> --}}

                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="vehicle.html"> vehicle </a>
                                </li> --}}

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                                </li>

                                @if (auth()->check())
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#"
                                                id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                @if (auth()->user()->img)
                                                    <img src="{{ asset('storage/uploads/images/' . auth()->user()->img) }}"
                                                        width="40" height="40" class="rounded-circle">
                                                @else
                                                    <img src="{{ asset('storage/uploads/images/defualt_profile.jpg') }}" width="40"
                                                        height="40" class="rounded-circle">
                                                @endif
                                            </a>
                                            @if (auth()->user()->role_id == 2)
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    <a class="dropdown-item"
                                                        href="{{ route('user-profile') }}">Profile</a>
                                                    <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                                                </div>
                                            @elseif (auth()->user()->role_id == 3)
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    <a class="dropdown-item"
                                                        href="{{ route('teacher-user-Dashboard') }}">Dashboard</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('teacher-user-profile') }}">Profile</a>
                                                    <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                                                </div>
                                            @endif
                                        </li>
                                    </ul>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            </ul>

                        </div>
                </nav>
            </div>
        </header>

    </div>
    <!-- end header section -->


    @yield('content')





    <!-- footer section -->
    <section class="container-fluid footer_section">
        <p>
            Copyright &copy; 2023 All Rights Reserved</a>
        </p>
    </section>
    <!-- footer section -->

    @yield('script-content')


    <script type="text/javascript" src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- progreesbar script -->



</body>

</html>
