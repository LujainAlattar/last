@extends('layout.otherMaster')

@section('title')
    <title>Show  Appointment</title>
@endsection

@section('header-style')
<style>
    .container{
        margin: auto;
        width: 90%;
    }
    .row{
        width: 100%;
    }
    .card-body{
        width: 900px;
    }
</style>
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper container">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Show  Appointment</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            <h5>Teacher Details</h5>
                            <div class="user-img-in">
                                <img src="{{ $teacher->img ? asset('storage/uploads/images/' . $teacher->img) : asset('home/images/defualt_profile.jpg') }}" alt="User Image" style="width: 200px; hieght:200px;">
                            </div>
                            <div class="row mb-3 mt-3">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $teacher->name }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Birthday</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" value="{{ $teacher->birthday }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Age</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $teacher->age }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $teacher->email }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label">Phone No</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $teacher->phone }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label">Location</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $teacher->location }}" readonly />
                                </div>
                            </div>

                            <hr>

                            <h5>Class Details</h5>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Subject Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $subject->subject_name }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $class->price }}" readonly />
                                </div>
                            </div>

                            <hr>

                            <h5>Appointment Details</h5>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Start Time</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" class="form-control" value="{{ $appointment->start_time }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">End Time</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" class="form-control" value="{{ $appointment->end_time }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $appointment->status == 1 ? 'Not Available' : 'Available' }}" readonly />
                                </div>
                            </div>

                            <hr>

                            @if ($payment)
                                <h5>Payment Details</h5>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Total Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $payment->price }}" readonly />
                                    </div>
                                </div>
                            @endif

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <a href="{{ route('user-profile') }}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
@endsection
