@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-center mt-3 text-white">Update Admin</h4>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3 mb-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success my-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('update-admin') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row justify-content-around">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="id" class="form-label fw-bold">Id</label>
                                        <input type="number" class="form-control" id="id" name="id">
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label fw-bold">Username</label>
                                        <input class="form-control" id="username" name="username" rows="5">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-bold">Password</label>
                                        <input class="form-control" id="password" name="password" rows="5">
                                    </div>
                                </div>
                            </div>
                            <div class="tombol">
                                <button type="submit" class="btn btn-primary">Update Data</button>
                            </div>
                        </form>

                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    {{-- <th>Password</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $a)
                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>{{ $a->username }}</td>
                                        {{-- <td>{{ $a->password }}</td> --}}
                                        {{-- <td>
                                        <a href="{{ url('admin/tasks/edit/'. $a->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ url('admin/tasks/'. $a->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
