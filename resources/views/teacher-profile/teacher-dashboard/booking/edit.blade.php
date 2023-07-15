@extends('layout.adminMaster')

@section('title')
    <title>appointment edit</title>
@endsection

@section('header-style')
@endsection


@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">update appointment</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            <form action="{{ route('teacher-editappointment-dashboard', $appointment->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <input type="hidden" name="id" value="{{ $appointment->id }}" id="id" />

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Start time</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="datetime-local" class="form-control" id="basic-icon-default-fullname start_time"
                                                placeholder="start_time" aria-label="start_time" name="start_time" value="{{$appointment->start_time}}"
                                                aria-describedby="basic-icon-default-fullname2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-age">End time</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="datetime-local" id="basic-icon-default-age end_time" class="form-control"
                                                placeholder="end_time" aria-label="end_time" aria-describedby="basic-icon-default-Age" value="{{$appointment->end_time}}"
                                                name="end_time" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                        <a href="{{ route('teacher-showappointment-dashboard') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
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
