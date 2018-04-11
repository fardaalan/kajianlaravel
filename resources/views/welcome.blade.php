@extends('layouts.master')
@section('css')
    <style>
        .header{
            background-image: url('https://www.newstatesman.com/sites/all/themes/creative-responsive-theme/images/new_statesman_events.jpg');
            height: 350px;
            width: 100%;
            background-repeat: no-repeat;
        }
        .subJudul{
            font-family: roboto;
            letter-spacing: 5px;
        }
        .Judul{
            font-family: roboto;
            padding-top: 6%;
        }
    </style>
@endsection
@section('header')
    <div class="header text-center text-light">
        <h1 class="Judul">Daily Events</h1>
        <p class="subJudul">" Tingkatkan Kemampuanmu "</p>
        <hr color="white" width="60%">
        <button class="btn btn-primary" onclick="location.href='event'">Lihat Semua Events</button>
    </div><br>
@endsection
@section('content')
    <div class="container text-center">
      <h2>Tingkatkan Kemampuanmu</h2>
      <p>Belajar Bersama Kami, Santren Koding</p>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <h2>Belajar Bareng</h2>
          <img width="27%" src="http://icons.iconarchive.com/icons/blackvariant/button-ui-system-folders-alt/512/Group-icon.png" alt=""><br>
          Belajar bersama kami, Santren Koding. Saling sharing ilmu pengetahuan.
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <h2>100% Gratis</h2>
          <img width="27%" src="http://icons.iconarchive.com/icons/graphicloads/flat-finance/256/dollar-icon.png" alt=""><br>
          Kami tidak memungut biaya apapun disini. Belajar Bersama Santren Koding 100% Gratis !
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <h2>Ilmu Agama</h2>
          <img width="27%" src="https://vignette.wikia.nocookie.net/future/images/6/6c/Star_and_Crescent.png/revision/latest?cb=20160910020315" alt=""><br>
          Tidak hanya belajar ilmu duniawi, bersama Santren Koding kita juga mempelajari ilmu agama.
        </div>
      </div>
    </div><br>
    <div class="container  text-center">
      <h2>Daily Events</h2>
      <p>Event yang diadakan Santren Koding</p>
        <div class="row">
          @foreach($event as $events)
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card" >
                    <img class="card-img-top" src="../uploads/{{$events->foto}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$events->nama}}</h5>
                        <p class="card-text">{{$events->keterangan}}</p>
                        <a href="users/{{$events->id}}/detailevent" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div><br>
@endsection
