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

        .card-img-top {
            width: 330px;
            height: 300px;
        }

        .card_teacher {
            width: 360px;
            height: 600px;
        }

        .range-slider {
            width: 300px;
            text-align: center;
            position: relative;

            .rangeValues {
                display: block;
            }
        }

        input[type=range] {
            -webkit-appearance: none;
            border: 1px solid white;
            width: 300px;
            position: absolute;
            left: 0;
        }

        input[type=range]::-webkit-slider-runnable-track {
            width: 300px;
            height: 5px;
            background: #ddd;
            border: none;
            border-radius: 3px;

        }

        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            border: none;
            height: 16px;
            width: 16px;
            border-radius: 50%;
            background: #082465;
            margin-top: -4px;
            cursor: pointer;
            position: relative;
            z-index: 1;
        }

        input[type=range]:focus {
            outline: none;
        }

        input[type=range]:focus::-webkit-slider-runnable-track {
            background: #ccc;
        }

        input[type=range]::-moz-range-track {
            width: 300px;
            height: 5px;
            background: #ddd;
            border: none;
            border-radius: 3px;
        }

        input[type=range]::-moz-range-thumb {
            border: none;
            height: 16px;
            width: 16px;
            border-radius: 50%;
            background: #21c1ff;

        }


        /*hide the outline behind the border*/

        input[type=range]:-moz-focusring {
            outline: 1px solid white;
            outline-offset: -1px;
        }

        input[type=range]::-ms-track {
            width: 300px;
            height: 5px;
            /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
            background: transparent;
            /*leave room for the larger thumb to overflow with a transparent border */
            border-color: transparent;
            border-width: 6px 0;
            /*remove default tick marks*/
            color: transparent;
            z-index: -4;

        }

        input[type=range]::-ms-fill-lower {
            background: #777;
            border-radius: 10px;
        }

        input[type=range]::-ms-fill-upper {
            background: #ddd;
            border-radius: 10px;
        }

        input[type=range]::-ms-thumb {
            border: none;
            height: 16px;
            width: 16px;
            border-radius: 50%;
            background: #21c1ff;
        }

        input[type=range]:focus::-ms-fill-lower {
            background: #888;
        }

        input[type=range]:focus::-ms-fill-upper {
            background: #ccc;
        }

        .form-error {
        color: red;
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
            <div class="d-flex justify-content-between mb-3">
                <div class="form-group">
                    <label for="subjectFilter" class="form-label">Filter by Subject:</label>
                    <select class="form-select" id="subjectFilter">
                        <option value="">All Subjects</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="display: flex; gap:5px; justify-content:center;">
                    <label for="priceFilter" class="form-label">Filter by price:</label>
                    <div class="range-slider">
                        <span class="rangeValues">
                            Min Price: <span id="minPriceDisplay">{{ $minprice }}</span> |
                            Max Price: <span id="maxPriceDisplay">{{ $maxprice }}</span>
                        </span>
                        <input id="minPriceSlider" value="{{ $minprice }}" min="{{ $minprice }}"
                            max="{{ $maxprice }}" type="range">
                        <input id="maxPriceSlider" value="{{ $maxprice }}" min="{{ $minprice }}"
                            max="{{ $maxprice }}" type="range">
                    </div>
                </div>

            </div>


            <div class="teacher_container layout_padding2" id="filteredTeachers">
                <div class="card-deck">
                    {{-- cards with pagination --}}
                    @foreach ($users as $user)
                        <div class="w3-third card_teacher ml-4 mb-4">
                            <div class="w3-white w3-text-grey w3-card-4 card_teacher_body">
                                <div class="w3-display-container">
                                    <img class="card-img-top"
                                        @if ($user->img) src="{{ asset('storage/uploads/images/' . $user->img) }}"
                                    @else
                                    src="{{ asset('home/images/defualt_profile.jpg') }}" @endif
                                        alt="Card image cap">
                                    <div class="w3-display-bottomleft w3-container w3-text-black mt-3"
                                        style="display: flex; justify-content:space-between; align-items:center;">
                                        <h3>{{ $user->name }}</h3>
                                        @foreach ($user->classes as $class)
                                            <h3>$
                                                {{ $class->price ?? 'No price Assigned' }}
                                            </h3>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="w3-container">
                                    @foreach ($user->classes as $class)
                                        <p class="subject-tag"><i
                                                class="fa fa-book fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                            {{ $class->subject->subject_name ?? 'No Subject Assigned' }}
                                        </p>
                                    @endforeach
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
                                <div class="d-flex justify-content-center mb-3">
                                    <a href="{{ route('teacher.show', $user->id) }}" class="call_to-btn">
                                        <span>Read More</span>
                                        <img src="{{ asset('home/images/right-arrow.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </section>

    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <h2 class="main-heading ">
                Our Students Feedback
            </h2>
            <p class="text-center">
                Discover what our students have to say about their learning experiences through their valuable feedback.</p>
            <div class="layout_padding2">
                <div class="client_container d-flex flex-column">
                    <div class="client_detail d-flex align-items-center">
                        <div class="client_img-box ">
                            <img style="border-radius: 40px"
                                src="@if ($randomReview->user_image) {{ asset('storage/uploads/images/' . $randomReview->user_image) }}@else{{ asset('home/images/defualt_profile.jpg') }} @endif"
                                alt="User Image">
                        </div>
                        <div class="client_detail-box">
                            <h4>
                                {{ $randomReview->name }}
                            </h4>
                            <span>
                                @for ($i = 1; $i <= $randomReview->star_rating; $i++)
                                <span><i class="fa fa-star text-warning"></i></span>
                            @endfor
                            </span>
                        </div>
                    </div>
                    <div class="client_text mt-4">
                        <p>
                            {{ $randomReview->feedback }}
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
                                <form action="{{ route('contact.store') }}" method="POST" id="contact-form">
                                    @csrf
                                    <div>
                                        <input type="text" name="name" id="name" placeholder="Name">
                                        <p class="form-error" id="name-error"></p>
                                    </div>
                                    <div>
                                        <input type="email" name="email" id="email" placeholder="Email">
                                        <p class="form-error" id="email-error"></p>
                                    </div>
                                    <div>
                                        <input type="text" name="message" id="message" placeholder="Message" class="input_message">
                                        <p class="form-error" id="message-error"></p>
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
@endsection


@section('script-content')
    <link href="https://cdn.jsdelivr.net/npm/nouislider@16.0.3/distribute/nouislider.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/nouislider@16.0.3/distribute/nouislider.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#subjectFilter').on('change', function() {
                const selectedSubject = $(this).val().toLowerCase(); // Convert to lowercase
                filterTeachersBySubject(selectedSubject);
            });

            function filterTeachersBySubject(subject) {
                const cards = $('.card_teacher');

                cards.each(function() {
                    const subjectTags = $(this).find('.subject-tag');
                    const showCard = subject === '' || subjectTags.filter(function() {
                        return $(this).text().toLowerCase().includes(
                            subject); // Case-insensitive comparison
                    }).length > 0;

                    if (showCard) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
            const minPriceSlider = $('#minPriceSlider');
            const maxPriceSlider = $('#maxPriceSlider');
            const minPriceDisplay = $('#minPriceDisplay'); // Add this element in your HTML
            const maxPriceDisplay = $('#maxPriceDisplay'); // Add this element in your HTML

            // Initialize the display values with the initial values from the sliders
            minPriceDisplay.text(minPriceSlider.val());
            maxPriceDisplay.text(maxPriceSlider.val());

            minPriceSlider.on('input', function() {
                filterTeachersByPrice();
                minPriceDisplay.text($(this).val());
            });

            maxPriceSlider.on('input', function() {
                filterTeachersByPrice();
                maxPriceDisplay.text($(this).val());
            });

            function filterTeachersByPrice() {
                const minPrice = parseFloat(minPriceSlider.val());
                const maxPrice = parseFloat(maxPriceSlider.val());

                const cards = $('.card_teacher');

                cards.each(function() {
                    const priceElements = $(this).find(
                        '.card_teacher_body h3'); // Assuming the price is in an h3 element

                    const teacherPrice = parseFloat(priceElements.last().text().replace('$', '').trim());

                    const showCard = (isNaN(minPrice) || teacherPrice >= minPrice) && (isNaN(maxPrice) ||
                        teacherPrice <= maxPrice);

                    if (showCard) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    </script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const messageInput = document.getElementById('message');

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

                // Validate message
                if (messageInput.value.trim() === '') {
                    valid = false;
                    document.getElementById('message-error').textContent = 'Message is required';
                }

                if (!valid) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
