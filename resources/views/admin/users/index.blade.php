@extends('layout.adminMaster')

@section('title')
    <title>users</title>
@endsection

@section('header-style')

@endsection


@section('content')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Users Table</h4>


            <!-- Striped Rows -->
            <div class="card">
                {{-- <h5 class="card-header">users rows</h5> --}}
                <br>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('userdashboard.show', $user->id) }}" class="btn"
                                        style="border: none; color: rgba(68, 38, 237, 0.848); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="{{ route('userdashboard.edit', $user->id) }}" class="btn"
                                        style="border: none; color: rgba(53, 211, 21, 0.814); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;"><i
                                            class="fa fa-edit"></i></a>
                                    <form action="{{ route('userdashboard.destroy', $user->id) }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0);" onclick="event.preventDefault();
                                                if (confirm('Are you sure you want to delete this user?')) {
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
                    </table>
                </div>
            </div>
            <!--/ Striped Rows -->

        </div>
    </div>

@endsection


@section('script-content')

@endsection
