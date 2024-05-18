@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Profile</h4>
                </div>
                <div class="d-flex flex-row">
                
                <div class="mt-3 mx-4">
                    <div>
                        <img src="{{ asset('assets/img/profile.svg') }}" alt="profile">
                    </div>
                    <div class="">
                        Alif Gayuh Arimukti
                    </div>
                    <div>
                        120000000 
                    </div>
                    <div>
                        RPL
                    </div>
                    <div>
                        2022
                    </div>
                    <div>
                        0899999999
                    </div>                 

                </div>
                <div class="card-body">
                    <form action="" method="">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="Alif Gayuh Arimukti">
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" id="nim" class="form-control" value="120000000">
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <input type="text" name="prodi" id="prodi" class="form-control" value="RPL">
                        </div>
                        <div class="form-group">
                            <label for="angkatan">Angkatan</label>
                            <input type="text" name="angkatan" id="angkatan" class="form-control" value="2022">
                        </div>
                        <div class="form-group">
                            <label for="noWa">no Whatsapp</label>
                            <input type="text" name="noWa" id="noWa" class="form-control" value="0899999999">
                        </div>

                        <div class="form-group">
                            <label for="password">New Password (optional)</label>
                            <input type="password" name="password" id="password" value="*****"class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-danger">Update Profile</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection