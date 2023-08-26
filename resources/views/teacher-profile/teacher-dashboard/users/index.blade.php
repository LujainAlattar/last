@extends('layout.adminMaster')

@section('title')
    <title>users</title>
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
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center search-input-container">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="search-input" placeholder="Search..." aria-label="Search..." name="search"
                        id="search" />
                </div>
            </div>


            <!-- Striped Rows -->
            <div class="card">
                {{-- <h5 class="card-header">users rows</h5> --}}
                <br>
                <div class="table text-nowrap">
                    <table class="table table-striped">
                        <div class="container-table-header">
                            <h4 class="fw-bold py-3 mb-4">Students Table</h4>
                        </div>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Notes & Assignments
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="alldata">
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->location }}</td>
                                    <td>
                                        <a href="{{ route('teacher-studenthistory-dashboard', $student->id) }}" class="btn"
                                            style="border: none; color: rgba(68, 38, 237, 0.848); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;"><i
                                                class="fa-solid fa-comments"></i></a>
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
                url: '{{ URL::to('user-search') }}',
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
@endsection
