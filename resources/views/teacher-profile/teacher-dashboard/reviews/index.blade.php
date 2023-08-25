@extends('layout.adminMaster')

@section('title')
    <title>Reviews</title>
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
                {{-- <h5 class="card-header">Teachers rows</h5> --}}
                <br>
                <div class="table text-nowrap">
                    <table class="table table-striped">
                        <div class="container-table-header">
                            <h4 class="fw-bold py-3 mb-4">Reviews Table</h4>
                        </div>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Feedback</th>
                                <th>Star Rating</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="alldata">
                            @foreach ($reviews as $rating)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $rating->name }}</td>
                                    <td>{{ $rating->email }}</td>
                                    <td>{{ $rating->feedback }}</td>
                                    <td> @for ($i = 1; $i <= $rating->star_rating; $i++)
                                        <span><i class="fa fa-star text-warning"></i></span>
                                    @endfor</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $reviews->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <!--/ Striped Rows -->

        </div>
    </div>
@endsection
