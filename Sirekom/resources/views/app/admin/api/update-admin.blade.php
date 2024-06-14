@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="text-center mt-3 text-white">Update Admin</h4>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3 mb-5">
                    <div class="card-body">
                        <form action="{{ url('update-admin')}}" method="POST" enctype="multipart/form-data">
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
                                <button type="submit">Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
