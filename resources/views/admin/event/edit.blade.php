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
Edit Event
@endsection
@section('content')
<div class="container p-4">
  <h1 class="text-center">Edit Event</h1>
  <form class="" action="/admin/event/{{$event->id}}/update" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
  <div class="row">

    <div class="col-lg-6">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama" class="form-control" value={{$event->nama}}><br>
        <label>Kuota</label>
        <input type="number" name="kuota" placeholder="Jumlah Max Kouta Peserta" class="form-control" value={{$event->kuota}}><br>
        <label>Deskripsi</label>
        <textarea type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" >{{$event->deskripsi}}</textarea>
    </div>
    <div class="col-lg-6">
      <label>Keterangan</label>
      <input type="text" name="keterangan" placeholder="Keterangan" class="form-control"  value={{$event->keterangan}}><br>
            <div class="col-lg-6">
              <label>Tanggal Mulai</label>
              <input type="date" name="mulai" placeholder="Tanggal Mulai" class="form-control" value={{$event->mulai}}><br>
            </div>
            <div class="col-lg-6">
              <label>Tanggal Selesai</label>
              <input type="date" name="selesai" placeholder="Tanggal Selesai" class="form-control" value={{$event->selesai}}><br>
            </div>
            <label for="foto">Upload Photo</label><br>
            <input type="file" class="form-control" id="file" name="file" required>
    </div>

  </div><br>
    <input type="submit" value="Edit Event" class="btn btn-md btn-primary">
    <a href="/admin/event" class="btn btn-md btn-danger">Batalkan</a>
  </form><br><br>
</div>
@endsection
