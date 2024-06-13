@extends('layouts.app')
@section('content')
<style>
    .container {
        background-color: white;
        width: 80%;
        padding-top: 10px;
        margin-top: 50px;
        border-radius: 20px;
        overflow: hidden;
        position: relative;

    }

    .img-header {
        top: 10px;
        right: 0;
        margin-bottom: 10px;
        width: 100%;
        height: 200px;
        border-radius: 10px;
        overflow: hidden;
    }

    .img-profile {
        position: absolute;
        top: 150px;
        left: 50px;
        width: 15rem;
        height: 15rem;
        padding: 10px;
        background-color: #922E2C;
        border-radius: 15px;
        overflow: hidden;
    }

    .detailProfile {
        /* display: flex;
                                                                                        width: 100%;
                                                                                        justify-content: flex-end;
                                                                                      background-color: aqua; */

        position: absolute;
        right: 0;
    }

    .tagJudulLomba {
        font-size: 36px;
        color: white;
        padding: 10px 80px;
        background-color: #922E2C;
        right: 0;
        text-transform: uppercase;
        font-weight: bold;
        border-radius: 5px 0 0 5px;
    }

    .br {
        margin-top: 15px;
        position: absolute;
        right: 0;
    }

    .contentLomba {
        margin-top: 120px;
    }

    .leftContent {
        display: flex;
        padding-top: 4.5rem;
        justify-content: flex-start;
        flex-direction: column;
    }

    .leftContent button {
        margin-bottom: 10px;
    }

    .guidebook {
        left: 3rem;
        width: 150px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 10px;
        padding: 0px 15px;
        background-color: rgb(66, 66, 66);
        border-radius: 10px;
        color: white;
        border: none;
        position: relative;
        cursor: pointer;
        transition-duration: .2s;
    }

    .guidebook:hover {
        background-color: rgb(77, 77, 77);
        transition-duration: .2s;
    }

    .guidebook:active {
        transform: translate(1px, 1px);
        transition-duration: .2s;
    }


    /*---- btn uiverse ----*/
    .button {
        left: 3rem;
        width: 200px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 10px;
        padding: 0px 15px;
        background-color: rgb(66, 66, 66);
        border-radius: 10px;
        color: white;
        border: none;
        position: relative;
        cursor: pointer;
        transition-duration: .2s;
    }

    .bell {
        width: 13px;
    }

    .bell path {
        fill: rgb(0, 206, 62);
    }

    .arrow {
        position: absolute;
        right: 0;
        width: 30px;
        height: 100%;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .button:hover {
        background-color: rgb(77, 77, 77);
        transition-duration: .2s;
    }

    .button:hover .arrow {
        animation: slide-right .6s ease-out both;
    }

    /* arrow animation */
    @keyframes slide-right {
        0% {
            transform: translateX(-10px);
            opacity: 0;
        }

        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .button:active {
        transform: translate(1px, 1px);
        transition-duration: .2s;
    }


    /* Right Content */
    .rightContent {
        display: flex;
        flex-direction: column;
    }

    .rightContent h6 {
        font-weight: bolder;
    }


    /* leftContent bottom */

    .card-notification {
        background-color: #D2FFD1;
        padding: 15px;
        border-radius: 10px;
        margin: 0 1rem;
    }

    .card-notification p {
        padding: 0 5px;

    }

    .header-announcement {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-announcement {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        border-radius: 50%;
        background-color: #00BA00;
        margin-right: 1rem;
    }

    .logo-announcement img {
        max-width: 15px;

    }

    .information-task {
        padding-right: 6rem;
    }

    .card-it {
        margin-bottom: 10px;
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        border-radius: 10px;
        align-items: center;
        box-shadow: 3px 3px 12px -3px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: 3px 3px 12px -3px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 3px 3px 12px -3px rgba(0, 0, 0, 0.75);
    }

    .undone {
        background-color: white;
    }

    .done {
        background-color: #D2FFD1;
    }
</style>


<div class="container ">
    <div class="Header">
        <img class="img-header" src="{{ asset('assets/img/detail-lomba/wallpaper.png') }}" alt="">
        <div class="header-lomba"><img class="img-profile" src="{{ Storage::url($lomba->posterLomba) }}" alt="">
        </div>
        <div class="detailProfile">
            <div class="tagJudulLomba">{{ $lomba->namaLomba }}</div>
            <div class="br">
                <img src={{ asset('assets/img/detail-lomba/break.png') }} alt="">
            </div>
        </div>
    </div>
    <div class="contentLomba">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-9">
                <div class="rightContent">
                    <h6>Tanggal Pendaftaran {{ $lomba->tanggalBukaPendaftaran }} s/d
                        {{ $lomba->tanggalTutupPendaftaran }}
                    </h6>
                    <p>{{ $lomba->deskripsiLomba }}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <br>
            <a href="{{ url('admin/tasks/create/' . $lomba->id) }}" class="btn btn-dark">Create New Task</a>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Buka</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->judul }}</td>
                        <td>{{ $task->deskripsi }}</td>
                        <td>{{ $task->tanggal_buka }}</td>
                        <td>{{ $task->type }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection