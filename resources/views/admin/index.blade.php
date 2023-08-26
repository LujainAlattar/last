@extends('layout.adminMaster')

@section('title')
    <title>dashboard</title>
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Hello {{ auth()->user()->name }} 👋</h5>
                                    <p class="mb-4">
                                        Welcome Back
                                    </p>


                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="{{ asset('admin/img/illustrations/man-with-laptop-light.png') }}"
                                        height="140" alt="View Badge User"
                                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 order-1">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-6 mb-12 mb-4 ">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="menu-icon tf-icons fa-solid fa-users"></i>
                                        </div>

                                    </div>
                                    <span class="fw-semibold d-block mb-1">Students</span>
                                    <h3 class="card-title mb-2">{{$students}}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 mb-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="menu-icon tf-icons fa-solid fa-user-tie"></i>

                                        </div>

                                    </div>
                                    <span class="fw-semibold d-block mb-1">Teachers</span>
                                    <h3 class="card-title mb-2">{{$teachers}}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 mb-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="fa-solid fa-sack-dollar"></i>
                                        </div>

                                    </div>
                                    <span class="fw-semibold d-block mb-1">Total Payments</span>
                                    <h3 class="card-title mb-2">${{$payments}}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 mb-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="fa-regular fa-money-bill-1"></i>
                                        </div>

                                    </div>
                                    <span class="fw-semibold d-block mb-1">Average for class</span>
                                    <h3 class="card-title mb-2">${{$classprice}}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 mb-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="menu-icon tf-icons fa-solid fa-book"></i>

                                        </div>

                                    </div>
                                    <span class="fw-semibold d-block mb-1">Subjects</span>
                                    <h3 class="card-title mb-2">{{$subjects}}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 mb-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="menu-icon tf-icons fa-solid fa-credit-card"></i>

                                        </div>

                                    </div>
                                    <span class="fw-semibold d-block mb-1">Bookings</span>
                                    <h3 class="card-title mb-2">{{$classestoken}}</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- / Content -->
    @endsection
