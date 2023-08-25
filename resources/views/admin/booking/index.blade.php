@extends('layout.adminMaster')

@section('title')
    <title>Bookings & Payments</title>
@endsection

@section('header-style')
    {{-- for the search --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        .container-table-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .container-table-header h4 {
            margin-left: 20px;

        }

        .container-table-header a {
            margin-right: 20px;
        }

        /* Custom search style */
        .search-input-container {
            display: flex;
            align-items: center;
            border-radius: 10px;
            padding: 4px;
            background-color: #fff;
            width: 100%;
            margin-bottom: 20px;
            box-shadow: 0 0 5px #e9ebf0;
        }

        .search-input-container .search-input {
            border: none;
            outline: none;
            flex-grow: 1;
            margin-left: 4px;
            height: 40px;
        }
    </style>
@endsection


@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <!-- Striped Rows -->
            <div class="card">
                <br>
                <div class="table text-nowrap">
                    <table class="table table-striped">
                        <div class="container-table-header">
                            <h4 class="fw-bold py-3 mb-4">Bookings & Payments Table</h4>
                        </div>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Teacher Name</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="alldata">
                            @foreach ($paginatedBookings as $booking)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $booking->class->subject->subject_name }}</td>
                                    <td>{{ $booking->class->user->name }}</td>
                                    <td>{{ $booking->start_time }}</td>
                                    <td>{{ $booking->end_time }}</td>
                                    <td>
                                        @if ($booking->status == 0)
                                            Available
                                        @else
                                            Not Available
                                        @endif
                                    </td>
                                    <td>
                                        @if ($booking->payment)
                                            {{ $booking->payment->price }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $paginatedBookings->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <!--/ Striped Rows -->

        </div>
    </div>
@endsection
