@extends('layout.adminMaster')

@section('title')
    <title>Notes & Assignments</title>
@endsection

@section('header-style')
@endsection


@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Add Asignment</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            <form action="{{ route('teacher-assignment-dashboard') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="student_id" value="{{ $studentId }}">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="file">Asignment</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="fa-solid fa-file-pen"></i></span>
                                            <input type="file" class="form-control" id="file" name="file"
                                                accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="{{ route('teacher-student-dashboard') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Add Notes</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <br>
                        <div class="card-body">
                            <form action="{{ route('teacher-notes-dashboard') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="student_id" value="{{ $studentId }}">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="note">Notes</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="fa-solid fa-pen-to-square"></i></span>
                                            <input type="text" class="form-control" id="note" name="note">
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a href="{{ route('teacher-student-dashboard') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Previous Notes & Assignments</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <br>
                    <div class="card-body">
                        @if ($previousNotes->isEmpty())
                            <p>No previous notes found for this student.</p>
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
