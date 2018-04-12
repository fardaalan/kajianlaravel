@extends('layouts.lte')
@section('css')
  <style>
    .container{
      background: white;
      border-radius: 4px;
    }
  </style>
@endsection
@section('header')
Event
@endsection
@section('content')
<div class="container p-4">
  <h1 class="text-center">E V E N T</h1>
  <div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-success btn-md" onclick="location.href='event/create'">Tambah Event</button>
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Laporan
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="event/pdf">PDF</a></li>
      <li><a href="event/excel">Excel</a></li>
    </ul>
  </div>
  </div>

    <br><br>
  <table class="table">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Gambar</th>
      <th>Keterangan</th>
      <th>Tanggal Mulai</th>
      <th>Tanggal Selesai</th>
      <th>Kuota</th>
      <th>Opsi</th>
    </tr>
    @php
      $no=1
    @endphp
    @foreach($event as $events)
    <tr>
      <td>{{$no++}}</td>
      <td>{{$events->nama}}</td>
      <td> <img src="../uploads/{{$events->foto}}" width="100px" alt=""> </td>
      <td>{{$events->keterangan}}</td>
      <td>{{$events->mulai}}</td>
      <td>{{$events->selesai}}</td>
      <td>{{$events->kuota}}</td>
      <td>
        <form action="event/{{$events->id}}" class="row" method="post">
          {{csrf_field()}}
          <a type="button" class="btn btn-sm btn-primary" name="button" href="event/{{$events->id}}/edit"><i class="fa fa-pencil"></i> Edit</a>
          <button type="submit" class="btn btn-sm btn-danger" name="button"><i class="fa fa-trash"></i> Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
