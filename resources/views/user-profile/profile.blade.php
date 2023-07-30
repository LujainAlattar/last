@extends('layout.otherMaster')
@section('title')
    <title>profile</title>
@endsection

@section('header-style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/profile.css') }}" rel="stylesheet">
@endsection


@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="profile-image-container">
                                    <img id="profile-image" class="rounded-circle" width="150"
                                        src="{{ auth()->user()->img ? asset('storage/uploads/images/' . auth()->user()->img) : asset('home/images/default_profile.jpg') }}"
                                        alt="Admin">
                                </div>
                                <div class="mt-3">
                                    <h4>{{ $user->name }}</h4>
                                    {{-- <p class="text-secondary mb-1">Full Stack Developer</p> --}}
                                    {{-- <p class="text-muted font-size-sm">{{$user->location}}</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->phone }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->location }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info" href="{{ route('edit-profile') }}">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <section class="book-now-section layout_padding" style="margin-top: -100px">
                        <div class="container">
                            <h2 class="main-heading">Book Now</h2>
                            <div class="book-now-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Teacher</th>
                                            <th>Subject</th> <!-- New column for displaying the subject name -->
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userAppointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->start_time }}</td>
                                                <td>{{ $appointment->end_time }}</td>
                                                <td>
                                                    {{ $appointment->class->teacher->name }}
                                                </td>
                                                <td>
                                                    {{ $appointment->class->subject->name }}
                                                    <!-- Display the subject name associated with the appointment's class -->
                                                </td>
                                                {{-- <td>
                                                    @if ($appointment->status == 0)
                                                        <form id="selectForm{{ $appointment->id }}"
                                                            action="{{ route('payment') }}" method="POST"
                                                            onsubmit="saveAppointmentAndClassId({{ $appointment->id }}, {{ $user->class->id ?? 'null' }})">
                                                            @csrf
                                                            <button type="submit" class="btn btn-select">Select</button>
                                                        </form>
                                                    @else
                                                        <p>This appointment is already taken.</p>
                                                    @endif
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('script-content')
    {{-- ajax to change the user img on click --}}
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
@endsection
