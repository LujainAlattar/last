@extends('layout.otherMaster')
@section('title')
    <title>about</title>
@endsection
@section('header-style')
    <style>
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .left {
            width: 500px;
            text-align: left;
        }

        .right {
            width: 500px;
        }
        .main-heading {
            text-align: left;
        }
        .layout_padding{
            padding: 0px;
            padding-bottom: 75px;
        }
        .righ .img-fluid{
            height: 700px;
            width: 700px;
        }
        .about_img-box{
            width: 100%;
            margin-bottom: 30px;
        }
    </style>
@endsection

@section('content')
    <!-- about section -->
    <section class="about_section layout_padding">
        <div class="container">

            <div class="flex-container">
                <div class="left">
                    <h2 class="main-heading ">
                        About School
                    </h2>
                    <br>
                    <p>
                        Welcome to EduPro, where personalized private classes empower learners of all levels. Our goal is to
                        help
                        you unlock your full potential through tailored education. Whether you're a beginner or an advanced
                        learner,
                        our dedicated instructors are here to guide you on your educational journey. With individualized
                        attention
                        and custom curriculum, we create a supportive environment for growth and lifelong learning.
                        <br> <br>
                        At EduPro, our passionate instructors are committed to your success. With expertise in their fields,
                        they
                        love teaching and understand that education is unique to each person. They work closely with you to
                        create a
                        personalized learning plan that suits your goals and learning style. Our classes are engaging,
                        relevant, and
                        impactful.
                        <br><br>
                        Join us at EduPro and experience the difference of personalized private classes. Explore a range of
                        subjects
                        and discover your potential. Our supportive environment will help you thrive and achieve your goals.
                        Together, let's embark on a transformative educational journey.
                    </p>
                </div>
                <div class="right">
                    <div class="about_img-box ">
                        <img src="{{ asset('home/images/teacher-student.png') }}" alt="" class="img-fluid w-100">
                    </div>
                </div>
            </div>



        </div>
    </section>


    <!-- about section -->
@endsection
