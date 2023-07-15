@extends('layout.adminMaster')

@section('title')
    <title>appointments</title>
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
            {{-- <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center search-input-container">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="search-input" placeholder="Search..." aria-label="Search..." name="search"
                        id="search" />
                </div>
            </div> --}}


            <!-- Striped Rows -->
            <div class="card">
                {{-- <h5 class="card-header">Teachers rows</h5> --}}
                <br>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <div class="container-table-header">
                            <h4 class="fw-bold py-3 mb-4">appointments Table</h4>
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item d-flex align-items-center">
                                    {{-- <label for="filter" class="form-label"><h6>Filter:</h6></label> --}}
                                    <select class="form-select" id="filter">
                                        <option value="">All</option>
                                        <option value="1">Available</option>
                                        <option value="0">Not Available</option>
                                    </select>
                                </div>
                            </div>
                            <a href="{{ route('teacher-createappointment-dashboard') }}" class="btn btn-primary">Create
                                appointment</a>
                        </div>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>start</th>
                                <th>end</th>
                                <th>availablity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="alldata">
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->index + 1 }}</td>
                                    <td>{{ $appointment->start_time }}</td>
                                    <td>{{ $appointment->end_time }}</td>
                                    <td>
                                        <span class="{{ $appointment->status == 0 ? 'text-success' : 'text-danger' }}">
                                            {{ $appointment->status == 1 ? 'Not Available' : ' Available' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($appointment->status == 1)
                                            <a href="{{ route('teacher-showuserappointment-dashboard.show', $appointment->id) }}"
                                                class="btn"
                                                style="border: none; color: rgba(68, 38, 237, 0.848); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('teacher-updateappointment-dashboard', $appointment->id) }}"
                                            class="btn"
                                            style="border: none; color: rgba(53, 211, 21, 0.814); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;"><i
                                                class="fa fa-edit"></i></a>
                                        <form action="{{ route('teacher-deleteappointment-dashboard', $appointment->id) }}"
                                            method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0);"
                                                onclick="event.preventDefault();
                                                if (confirm('Are you sure you want to delete this appointment?')) {
                                                    $(this).closest('form').submit();
                                                }"
                                                class="btn"
                                                style="border: none; color: rgba(246, 16, 16, 0.7); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- for the search --}}
                        <tbody id="Content" class="searchdata"></tbody>
                    </table>
                </div>
            </div>
            <!--/ Striped Rows -->

        </div>
    </div>
@endsection


@section('script-content')
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();

            if ($value) {
                console.log('Search value present');
                $('#alldata').hide();
                $('#Content').show();
            } else {
                console.log('Search value empty');
                $('#alldata').show();
                $('#Content').hide();
            }

            $.ajax({
                type: 'get',
                url: '{{ URL::to('teacher-search') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    console.log("data");
                    $('#Content').html(data);
                }
            });

        })
    </script>
    <script>
        $('#filter').on('change', function() {
            const filterValue = $(this).val();
            filterTable(filterValue);
        });

        function filterTable(filterValue) {
            const rows = $('#alldata').find('tr');

            rows.each(function() {
                const availabilityCell = $(this).find('td:nth-child(4)');
                const isAvailable = availabilityCell.find('span').hasClass('text-success');

                if (filterValue === '' || (filterValue === '1' && isAvailable) || (filterValue === '0' && !
                        isAvailable)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    </script>
@endsection
