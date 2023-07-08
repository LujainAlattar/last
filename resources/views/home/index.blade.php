@extends('layout.homeMaster')
@section('title')
    <title>EduPro</title>
@endsection

@section('header-style')
    <style>
        .card_teacher {
            box-shadow: 0 0 10px rgba(75, 75, 75, 0.567);
        }

        .card_teacher_body {
            padding: 10px
        }

        .card-img-top{
            width: 300px;
            height: 300px;
        }
        .card_teacher{
            width: 330px;
            height: 600px;
        }
    </style>
@endsection

@section('content')
    <section class="hero_section ">
        <div class="hero-container container">
            <div class="hero_detail-box">
                <h3>
                    Welcome to <br>
                </h3>
                <h1>
                    EduPro
                </h1>
                <p>
                    Personalized private classes for all levels. Passionate instructors. Achieve your goals.
                </p>
                {{-- <div class="hero_btn-continer">
                    <a href="" class="call_to-btn btn_white-border">
                        <span>
                            Read more
                        </span>
                        <img src="{{ asset('home/images/right-arrow.png') }}" alt="">
                    </a>
                </div> --}}
            </div>
            <div class="hero_img-container">
                <div>
                    <img src="{{ asset('home/images/hero.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    </div>
    <!-- end header section -->


    <!-- teacher section -->
    <section class="teacher_section layout_padding-bottom">
        <div class="container">
            <h2 class="main-heading ">
                Our Teachers
            </h2>
            <p class="text-center">
                Meet our team of dedicated and experienced instructors who are passionate about guiding you on your learning
                journey.
            </p>
            <div class="teacher_container layout_padding2">
                <div class="card-deck">
                    {{-- cards with pagination --}}
                    @foreach ($users as $user)
                        <div class="w3-third card_teacher ml-4">
                            <div class="w3-white w3-text-grey w3-card-4 card_teacher_body">
                                <div class="w3-display-container">
                                    <img class="card-img-top" src="{{ asset('storage/uploads/images/' . $user->img) }}"
                                        alt="Card image cap">
                                    <div class="w3-display-bottomleft w3-container w3-text-black"
                                        style="display: flex; justify-content:space-between; align-items:center;">
                                        <h2>{{ $user->name }}</h2>
                                        <h5>$ {{ $user->price }}</h5>
                                    </div>
                                </div>
                                <div class="w3-container">
                                    <p><i
                                            class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->occupation }}
                                    </p>
                                    <p><i
                                            class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->location }}
                                    </p>
                                    <p><i
                                            class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->email }}
                                    </p>
                                    <p><i
                                            class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->phone }}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-center mt-5">
                                    <a href="{{ route('teacher') }}" class="call_to-btn">
                                        <span>
                                            Read More
                                        </span>
                                        <img src="{{ asset('home/images/right-arrow.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


            {{-- <div class="d-flex justify-content-center mt-3">
                <a href="" class="call_to-btn  ">

                    <span>
                        See More
                    </span>
                    <img src="{{ asset('home/images/right-arrow.png') }}" alt="">
                </a>
            </div> --}}
        </div>
    </section>

    <!-- teacher section -->

    <!-- vehicle section -->
    {{-- <section class="vehicle_section layout_padding">
        <div class="container">
            <h2 class="main-heading ">
                Vehicles Facility
            </h2>
            <p class="text-center">
                There are many variations of passages of Lorem Ipsum available, but the majority hThere are many variations
                of
                passages of Lorem Ipsum available, but the majority h
            </p>
            <div class="layout_padding-top">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="vehicle_img-box ">
                                <img src="{{ asset('home/images/bus.png') }}" alt="" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="vehicle_img-box ">
                                <img src="{{ asset('home/images/bus.png') }}" alt="" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="vehicle_img-box ">
                                <img src="{{ asset('home/images/bus.png') }}" alt="" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </section> --}}


    <!-- vehicle section -->
    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <h2 class="main-heading ">
                Our Students Feedback
            </h2>
            <p class="text-center">
                There are many variations of passages of Lorem Ipsum available, but the majority hThere are many variations
                of
                passages of Lorem Ipsum available, but the majority h
            </p>
            <div class="layout_padding2">
                <div class="client_container d-flex flex-column">
                    <div class="client_detail d-flex align-items-center">
                        <div class="client_img-box ">
                            <img src="{{ asset('home/images/student.png') }}" alt="">
                        </div>
                        <div class="client_detail-box">
                            <h4>
                                Veniam Quis
                            </h4>
                            <span>
                                (exercitation)
                            </span>
                        </div>
                    </div>
                    <div class="client_text mt-4">
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu
                            fugiat
                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit
                            anim id est laborum."


                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- client section -->

    <!-- contact section -->

    <section class="contact_section layout_padding-bottom">
        <div class="container">

            <h2 class="main-heading">
                Contact Now

            </h2>
            <p class="text-center">
                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla

            </p>
            <div class="">
                <div class="contact_section-container">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="contact-form">
                                <form action="">
                                    <div>
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Phone Number">
                                    </div>
                                    <div>
                                        <input type="email" placeholder="Email">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Message" class="input_message">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn_on-hover">
                                            Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- end contact section -->

    <!-- admission section -->
    <section class="admission_section ">
        <div class="container-fluid position-relative">
            <div class="row h-100">
                <div id="map" class="h-100 w-100 ">
                </div>
                <div class="container">
                    <div class="admission_container position-absolute">
                        <div class="admission_img-box">
                            <img src="images/kidss.jpg" alt="">
                        </div>
                        <div class="admission_detail">
                            <h3>
                                Apply for Admission
                            </h3>
                            <p class="mt-3 mb-4">
                                There are many variations of passages of Lorem Ipsum available, but the majority h
                            </p>
                            <div class="">
                                <a href="" class="admission_btn btn_on-hover">
                                    Read More
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <!-- admission section -->


    <!-- landing section -->
    <section class="landing_section layout_padding">
        <div class="container">
            <h2 class="main-heading">
                Free Multipurpose Responsive

            </h2>
            <h2 class="main-heading number_heading">
                Landing Page 2019

            </h2>
            <p class="landing_detail text-center">
                There are many variations of passages of Lorem Ipsum available, but the majority There are many variations
                of
                passages of Lorem Ipsum available, but the majority h

            </p>
        </div>
    </section>

    <!-- end landing section -->
@endsection
