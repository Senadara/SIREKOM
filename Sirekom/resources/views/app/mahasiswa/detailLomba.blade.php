@extends('layouts.app')
@section('content')

<style>
    .container{
        background-color: white; 
        width: 80%;
        padding-top:10px; 
        margin-top: 50px;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        height: 100vh;
    }
    
    .img-header{
        top: 10px;
        right: 0;
        margin-bottom: 10px;
        width: 100%;
        height: 200px;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .img-profile{
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
    
    .detailProfile{
        /* display: flex;
        width: 100%;
        justify-content: flex-end;
        background-color: aqua; */

        position: absolute;
        right: 0;
    }

    .tagJudulLomba{
        font-size: 36px;
        color: white;
        padding: 10px 80px;
        background-color: #922E2C;
        right: 0;
        text-transform: uppercase;
        font-weight: bold;
        border-radius: 5px 0 0 5px;
    }

    .br{
        margin-top: 15px;
        position: absolute;
        right: 0;
    }

    .contentLomba{
        margin-top: 120px;
    }
    
    .leftContent{
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
    }
</style>


    <div class="container ">
        <div class="Header">
            <img class="img-header" src="{{ asset("assets/img/detail-lomba/wallpaper.png") }}" alt="">
            <div class="header-lomba"><img class="img-profile" src="{{ Storage::url($lomba->posterLomba) }}" alt=""></div>
            <div class="detailProfile">
                <div class="tagJudulLomba">{{ $lomba->namaLomba }}</div>
                <div class="br">
                    <img src={{ asset("assets/img/detail-lomba/break.png" ) }} alt="">
                </div>
            </div>
        </div>
        <div class="contentLomba">
            <div class="row">
                <div class="col-3">
                  <div class="leftContent">
                    <button>adlfjaldfj</button>
                    <button>adlfjaldfj</button>
                    <button>adlfjaldfj</button>
                  </div>
                </div>
                <div class="col-9">
                 <div class="rightContent">
                    <h6>Tanggal Pendaftaran 19-08-2024 s/d 19-09-2024</h6>
                 </div>
                </div>
            </div>
        </div>
    </div>
@endsection
