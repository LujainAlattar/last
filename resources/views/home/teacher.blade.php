@extends('layout.otherMaster')

@section('title')
    <title>{{ $user->name }} - Teacher Details</title>
@endsection

@section('header-style')
    <style>
        .teacher-img-container {
            height: 300px;
            /* Set the desired height */
        }

        .teacher-img-container img {
            max-height: 100%;
            /* Ensure the image doesn't exceed the container's height */
            max-width: 100%;
            /* Ensure the image doesn't exceed the container's width */
        }

        .btn {
            background-color: #082465;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: box-shadow 0.3s;
        }

        .btn:hover {
            box-shadow: 0 2px 4px #082465;
            color: white;
        }

        .rd-reviews {
            padding-top: 55px;
            border-top: 1px solid #e5e5e5;
            margin-bottom: 50px;
        }

        .rd-reviews h4 {
            color: #19191a;
            letter-spacing: 1px;
            margin-bottom: 45px;
        }

        .rd-reviews .review-item {
            margin-bottom: 32px;
        }

        .rd-reviews .review-item .ri-pic {
            float: left;
            margin-right: 30px;
        }

        .rd-reviews .review-item .ri-pic img {
            height: 70px;
            width: 70px;
            border-radius: 50%;
        }

        .rd-reviews .review-item .ri-text {
            overflow: hidden;
            position: relative;
            padding-left: 30px;
        }

        .rd-reviews .review-item .ri-text:before {
            position: absolute;
            left: 0;
            top: 0;
            width: 1px;
            height: 100%;
            background: #e9e9e9;
            content: "";
        }

        .rd-reviews .review-item .ri-text span {
            font-size: 12px;
            color: #dfa974;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .rd-reviews .review-item .ri-text .rating {
            position: absolute;
            right: 0;
            top: 0;
        }

        .rd-reviews .review-item .ri-text .rating i {
            color: #f5b917;
        }

        .rd-reviews .review-item .ri-text h5 {
            color: #19191a;
            margin-top: 4px;
            margin-bottom: 8px;
        }

        .rd-reviews .review-item .ri-text p {
            color: #707079;
            margin-bottom: 0;
        }

        .review-add h4 {
            color: #19191a;
            letter-spacing: 1px;
            margin-bottom: 45px;
        }

        .review-add .ra-form input {
            width: 100%;
            height: 50px;
            border: 1px solid #e5e5e5;
            font-size: 16px;
            color: #aaaab3;
            padding-left: 20px;
            margin-bottom: 25px;
        }

        .review-add .ra-form input::-webkit-input-placeholder {
            color: #aaaab3;
        }

        .review-add .ra-form input::-moz-placeholder {
            color: #aaaab3;
        }

        .review-add .ra-form input:-ms-input-placeholder {
            color: #aaaab3;
        }

        .review-add .ra-form input::-ms-input-placeholder {
            color: #aaaab3;
        }

        .review-add .ra-form input::placeholder {
            color: #aaaab3;
        }

        .review-add .ra-form h5 {
            font-size: 20px;
            color: #19191a;
            margin-bottom: 24px;
            float: left;
            margin-right: 10px;
        }

        .review-add .ra-form .rating {
            padding-top: 3px;
            display: inline-block;
        }

        .review-add .ra-form .rating i {
            color: #f5b917;
            font-size: 16px;
        }

        .review-add .ra-form textarea {
            width: 100%;
            height: 132px;
            border: 1px solid #e5e5e5;
            font-size: 16px;
            color: #aaaab3;
            padding-left: 20px;
            padding-top: 12px;
            margin-bottom: 24px;
            resize: none;
        }

        .review-add .ra-form textarea::-webkit-input-placeholder {
            color: #aaaab3;
        }

        .review-add .ra-form textarea::-moz-placeholder {
            color: #aaaab3;
        }

        .review-add .ra-form textarea:-ms-input-placeholder {
            color: #aaaab3;
        }

        .review-add .ra-form textarea::-ms-input-placeholder {
            color: #aaaab3;
        }

        .review-add .ra-form textarea::placeholder {
            color: #aaaab3;
        }

        .review-add .ra-form button {
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            color: #ffffff;
            letter-spacing: 2px;
            background: #082465;
            border: none;
            padding: 14px 34px 13px;
            display: inline-block;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .reviews_rating {
            margin: auto;
            width: 70%;
            margin-bottom: 50px;

        }
        .book-now-section{
            margin-top: -50px;
        }
    </style>

    <style>
        @media screen and (max-width: 1000px) {
        .layout_padding{
           padding: 150px 0 ;
        }
        .teacher-info{
            margin: 20px;
        }
        .book-now-section{
            margin-top: -170px;
        }
    }
    </style>
@endsection

@section('content')
    <!-- Teacher Details Section -->

    <section class="teacher-details-section layout_padding" style="margin-top: -100px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="teacher-img-container d-flex justify-content-center align-items-center">
                        <img src="@if ($user->img) {{ asset('storage/uploads/images/' . $user->img) }}@else{{ asset('home/images/defualt_profile.jpg') }} @endif"
                            alt="Teacher Image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="teacher-info">
                        <h2>{{ $user->name }}</h2>
                        <p><i class="fa fa-book fa-fw w3-margin-right w3-large w3-text-teal"></i>
                            @if ($class && $subject)
                                {{ $subject->subject_name }}
                            @else
                                No Subject Assigned
                            @endif
                        </p>
                        @if ($class)
                            <p><i class="fa fa-dollar fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $class->price }}</p>
                        @endif
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->location }}</p>
                        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->email }}</p>
                        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->phone }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Teacher Details Section -->

    <!-- Book Now Section -->
    <section class="book-now-section layout_padding" >
        <div class="container">
            <h2 class="main-heading mb-4">Book Now</h2>
            <div class="book-now-container"  style="max-height: 300px; overflow-y: auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->start_time }}</td>
                                <td>{{ $appointment->end_time }}</td>
                                <td>
                                    @if ($appointment->status == 0)
                                        <p class="text-success">Available</p>
                                    @else
                                        <p class="text-danger">Not Available</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($appointment->status == 0)
                                        <form id="selectForm{{ $appointment->id }}" action="{{ route('payment') }}"
                                            method="POST"
                                            onsubmit="saveAppointmentAndClassId({{ $appointment->id }}, {{ $user->class->id ?? 'null' }})">
                                            @csrf
                                            @if (auth()->check())
                                                <button type="submit" class="btn btn-select">Select</button>
                                            @else
                                                <p>You should be logged in to make appointment.</p>
                                            @endif
                                        </form>
                                    @else
                                        <p>This appointment is already taken.</p>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <div class="reviews_rating">
        <div class="rd-reviews">

            <h4>Reviews :</h4>
            <div class="review-item p-3 rounded" style="max-height: 600px; overflow-y: auto;">
                @foreach ($ratings as $rating)
                    <div class="ri-pic">
                        <img style="border-radius: 40px"
                            src="@if ($rating->user_image) {{ asset('storage/uploads/images/' . $rating->user_image) }}@else{{ asset('home/images/defualt_profile.jpg') }} @endif"
                            alt="User Image">
                    </div>
                    <div class="ri-text">
                        <span>{{ $rating->created_at->format('M d, Y') }}</span>
                        <div class="rating">
                            <p class="mt-1">
                                @for ($i = 1; $i <= $rating->star_rating; $i++)
                                    <span><i class="fa fa-star text-warning"></i></span>
                                @endfor
                            </p>
                        </div>
                        <h5>{{ $rating->name }}</h5>
                        <p>{{ $rating->feedback }}</p>
                    </div>
                    <br>
                    <hr>
                @endforeach
            </div>

        </div>
        <div class="review-add">
            <h4>Add Review :</h4>
            <form class="ra-form" action="{{ route('review.store') }}" method="POST">
                @csrf

                <div class="row">
                    @auth
                        <input type="hidden" name="userimg" value="{{ auth()->user()->img }}">
                    @else
                        <input type="hidden" name="userimg" value="{{ asset('images/default_profile.jpg') }}">
                    @endauth
                    <input type="hidden" value="{{ $class->id }}" name="class_id">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Name*" name="name">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" placeholder="Email*" name="email">
                    </div>
                    <div class="col-lg-12">
                        <div class="rating">
                            <div class="rate">
                                <input type="radio" id="star5" class="rate" name="rating" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" checked id="star4" class="rate" name="rating" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" class="rate" name="rating" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" class="rate" name="rating" value="2">
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" class="rate" name="rating" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                        <textarea placeholder="Your Review" name="comment"></textarea>
                        <button type="submit">Submit Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Book Now Section -->
@endsection


@section('script-content')
    <script>
        function saveAppointmentAndClassId(appointmentId, classId) {
            // Save the appointment ID and class ID to local storage
            localStorage.setItem('selectedAppointmentId', appointmentId);
            localStorage.setItem('selectedClassId', classId);
            console.log('Data saved to localStorage:', appointmentId, classId);
        }
    </script>
@endsection
