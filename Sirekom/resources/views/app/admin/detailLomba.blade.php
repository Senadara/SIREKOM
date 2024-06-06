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
            height: 100vh;
        }

        .img-header {
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
            position: absolute;
            right: 0;
        }

        .tagJudulLomba {
            font-size: 40px;
            color: white;
            padding: 15px 60px;
            background-color: #922E2C;
            /* right: 0; */
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 15px 15px 15px 15px;
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

        /* button register dan guidebook */
        .guidebook,
        .button {
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

        .button{
            width: 200px;
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


        .guidebook:hover,
        .button:hover {
            background-color: rgb(77, 77, 77);
            transition-duration: .2s;
        }

        .button:hover .arrow {
            animation: slide-right .6s ease-out both;
        }

        .button:active,
        .guidebook:active{
            transform: translate(1px, 1px);
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
            max-width: 20px;

        }

        .information-task {
            padding-right: 6rem;
        }

        .card-it {
            margin-bottom: 10px;
            padding: 1rem 1rem;
            display: flex;
            justify-content: space-between;
            border-radius: 15px;
            align-items: center;
            box-shadow: 5px 20px 20px -3px rgba(0, 0, 0, 0.75);
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
                    <div class="leftContent">
                        {{-- btn uiverse --}}
                          <button class="button">
                            <img src={{ asset('assets/img/list-lomba/editing.png') }} alt="" style="width: 25px">
                            apa?
                            <!-- <img src={{ asset('assets/img/list-lomba/bin.png') }} alt="" style="widht: 25px"> -->
                            <div class="arrow">›</div>
                        </button>  

                        <button class="guidebook" onclick=window.location.href="{{ Storage::url($lomba->lampiran) }}"><img
                                src={{ asset('assets/img/detail-lomba/doc.png') }} alt=""
                                style="width: 25px">Guidebook</button>


                    </div>
                </div>
                <div class="col-9">
                    <div class="rightContent">
                        <h6>Tanggal Pendaftaran {{ $lomba->tanggalBukaPendaftaran }} s/d
                            {{ $lomba->tanggalTutupPendaftaran }} </h6>
                        <p>{{ $lomba->deskripsiLomba }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="">
                        <div class="card-notification">
                            <div class="header-announcement">
                                <div class="logo-announcement">
                                    <img src={{ asset('assets/img/detail-lomba/announcement.png') }} alt="">
                                </div>

                                <h6>Announcement!!!</h6>
                            </div>
                            <div class="message">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="information-task">
                    <div class="card-it undone">
                    <img src="{{ asset('assets/img/detail-lomba/document.png') }}" alt="" style="width: 40px">
                    <a href="{{ url('/admin/list-task') }}">List Tugas</a>
                    <img src="{{ asset('assets/img/detail-lomba/check.png') }}" alt="" style="width: 40px">
                </div>
                        <div class="card-it undone">
                            <img src={{ asset('assets/img/detail-lomba/document.png') }} alt=""
                                style="width: 40px">
                            <a href="{{ url('/admin/task-admin') }}">List Pengumpulan</a>
                            <img src={{ asset('assets/img/detail-lomba/check.png') }} alt="" style="width: 40px">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
