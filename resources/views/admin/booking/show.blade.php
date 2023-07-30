@extends('layout.adminMaster')

@section('title')
    <title>user edit</title>
@endsection

@section('header-style')
    <style>
        input {
            pointer-events: none;
        }

        .user-img-in {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .user-img-in img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
    </style>
@endsection


@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Show user</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            <form action="{{ route('teacher-dashboard.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" value="{{ $user->id }}" id="id" />
                                <div class="user-img-in">
                                    <img src="{{ $user->img ? asset('storage/uploads/images/' . $user->img) : asset('home/images/default_profile.jpg') }}" alt="User Image">
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                    class="bx bx-user"></i></span>
                                            <input type="text" class="form-control" id="basic-icon-default-fullname"
                                                name="name" placeholder="Name" aria-label="Name"
                                                aria-describedby="basic-icon-default-fullname2"
                                                value="{{ $user->name }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-age">Birthday</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"></span>
                                            <input type="date" id="basic-icon-default-age" class="form-control"
                                                name="birthday" placeholder="Age" aria-label="Age"
                                                aria-describedby="basic-icon-default-Age" value="{{ $user->birthday }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-age">Age</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"></span>
                                            <input type="text" id="basic-icon-default-age" class="form-control"
                                                name="Age" placeholder="Age" aria-label="Age"
                                                aria-describedby="basic-icon-default-Age" value="{{ $user->age }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                            <input type="text" id="basic-icon-default-email" class="form-control"
                                                name="email" placeholder="email@email.com" aria-label="email@email.com"
                                                aria-describedby="basic-icon-default-email2" value="{{ $user->email }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone No</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                    class="bx bx-phone"></i></span>
                                            <input type="text" id="basic-icon-default-phone" name="phone"
                                                class="form-control phone-mask" placeholder="07 **** ****"
                                                aria-label="07 **** ****" aria-describedby="basic-icon-default-phone2"
                                                value="{{ $user->phone }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Location</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-location" class="input-group-text"><i
                                                    class="fa-solid fa-location-dot"></i></span>
                                            <input type="text" id="basic-icon-default-location"
                                                class="form-control location-mask" placeholder="Location" name="location"
                                                aria-label="Location" aria-describedby="basic-icon-default-location"
                                                value="{{ $user->location }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('user-dashboard.index') }}" class="btn btn-primary">Back</a>
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
@endsection
