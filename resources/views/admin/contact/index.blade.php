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
                                <th> Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="alldata">
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ $contact->created_at	 }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $contacts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <!--/ Striped Rows -->

        </div>
    </div>
@endsection
