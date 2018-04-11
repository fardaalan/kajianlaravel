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
Tambah Event
@endsection
@section('content')
<div class="container p-4">
  <h1 class="text-center">Tambah Event</h1>
  <form action="/admin/event" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="row">

    @if(count($errors) > 0)
        <div class="alert alert-danger">
          Upload File Error <br><br>
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
    @endif

      <div class="col-lg-6">
          <label>Nama</label>
          <input type="text" name="nama" placeholder="Nama" class="form-control"><br>
          <label>Kuota</label>
          <input type="number" name="kuota" min="0" placeholder="Jumlah Max Kouta Peserta" class="form-control"><br>
          <label>Deskripsi</label>
          <textarea type="text" name="deskripsi" placeholder="Deskripsi" class="form-control"></textarea>
      </div>
      <div class="col-lg-6">
        <label>Keterangan</label>
        <input type="text" name="keterangan" placeholder="Keterangan" class="form-control"><br>
              <div class="col-lg-6">
                <label>Tanggal Mulai</label>
                <input type="date" name="mulai" placeholder="Tanggal Mulai" class="form-control"><br>
              </div>
              <div class="col-lg-6">
                <label>Tanggal Selesai</label>
                <input type="date" name="selesai" placeholder="Tanggal Selesai" class="form-control"><br>
              </div>
              <label for="foto">Upload Photo</label>
              <input type="file" class="form-control" id="file" name="file" required>
      </div>

  </div><br>
    <input type="submit" value="Tambah Event" class="btn btn-md btn-primary">
    <a href="/admin/event" class="btn btn-md btn-danger">Batalkan</a>
  </form><br><br>
</div>
@endsection
