@extends('layout.otherMaster')

@section('title')
    <title>Notes & Assignments</title>
@endsection

@section('header-style')
    <style>
        .row {
            min-height: 425px;
        }

        .container {
            margin-left: 50px
        }

        .left,
        .right {
            width: 550px;
        }

        @media screen and (max-width: 600px) {
            .row {
                min-height: 525px;
            }

            .container {
                margin-left: 30px
            }

            .left,
            .right {
                width: 300px;
            }
        }
    </style>
@endsection


@section('content')
    <!-- Content wrapper -->
    <div class="container-xxl flex-grow-1 container-p-y container">
        <div class="row">
            <div class="row" style="gap: 20px;">
                <div class="col-xxl left">
                    <h4 class="fw-bold py-3 mb-4">Previous Notes </h4>
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            @if ($previousNotes->isEmpty())
                                <p>No previous notes.</p>
                            @else
                                <ol>
                                    @foreach ($previousNotes as $note)
                                        @if ($note->assignment == null)
                                            <li> {{ $note->note }}</li>
                                        @endif
                                    @endforeach
                                </ol>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xxl right">
                    <h4 class="fw-bold py-3 mb-4">Previous Assignments</h4>
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            @if ($previousNotes->isEmpty())
                                <p>No previous assignments found.</p>
                            @else
                                <ol>
                                    @foreach ($previousNotes as $note)
                                        @if ($note->note == null)
                                            <li> {{ $note->assignment }} :
                                                <a href="{{ route('show-assignment', $note->assignment) }}"
                                                    target="_blank">Download Assignment</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ol>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <a href="{{ route('user-profile') }}" class="btn btn-primary mb-5">Back</a>
    </div>
@endsection

@section('script-content')
@endsection
