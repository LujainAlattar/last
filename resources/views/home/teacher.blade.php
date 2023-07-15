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
    </style>
@endsection

@section('content')
    <!-- Teacher Details Section -->

    <section class="teacher-details-section layout_padding" style="margin-top: -100px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="teacher-img-container d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/uploads/images/' . $user->img) }}" alt="Teacher Image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="teacher-info">
                        <h2>{{ $user->name }}</h2>
                        <p><i class="fa fa-book fa-fw w3-margin-right w3-large w3-text-teal"></i>
                            @if ($user->class && $user->class->subject)
                                {{ $user->class->subject->subject_name }}
                            @else
                                No Subject Assigned
                            @endif
                        </p>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->location }}</p>
                        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->email }}</p>
                        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->phone }}</p>
                        @if ($user->class)
                            <p><i
                                    class="fa fa-dollar fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $user->class->price }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Teacher Details Section -->

    <!-- Book Now Section -->
    <section class="book-now-section layout_padding" style="margin-top: -100px">
        <div class="container">
            <h2 class="main-heading">Book Now</h2>
            <div class="book-now-container">
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
                                        <form id="selectForm{{ $appointment->id }}"
                                            action="{{ route('payment') }}" method="POST"
                                            onsubmit="saveAppointmentAndClassId({{ $appointment->id }}, {{ $user->class->id ?? 'null' }})">
                                            @csrf
                                            <button type="submit" class="btn btn-select">Select</button>
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
