@extends('layout.otherMaster')

@section('title')
    <title>Notes & Assignments</title>
@endsection

@section('header-style')
<style>
    .row{
        min-height: 495px;
    }
    .container{
        margin-left: 50px
    }

</style>
@endsection


@section('content')
    <!-- Content wrapper -->
    <div class="container-xxl flex-grow-1 container-p-y container">
        <h4 class="fw-bold py-3 mb-4">Previous Notes & Assignments</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <br>
                    <div class="card-body">
                        @if ($previousNotes->isEmpty())
                            <p>No previous notes & assignments found.</p>
                        @else
                            <ol>
                                @foreach ($previousNotes as $note)
                                    @if ($note->assignment == null)
                                        <li> {{ $note->note }}</li>
                                    @else
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
@endsection

@section('script-content')
@endsection
