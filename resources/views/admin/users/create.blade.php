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
Tambah User
@endsection
@section('content')
<div class="container p-4">
  <h1 class="text-center">Tambah User</h1>
  <form action="/admin/users/" method="post">
    {{csrf_field()}}
  <div class="row">

      <div class="col-lg-6 form-group">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama" class="form-control"><br>
        <label>Email</label>
        <input type="email" name="email" placeholder="Email" class="form-control"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" class="form-control">
      </div>

  </div><br>
    <input type="submit" name="submit" value="Tambah User" class="btn btn-md btn-primary">
    <a href="/admin/users" class="btn btn-md btn-danger">Batalkan</a>
  </form><br><br>
</div>
@endsection
