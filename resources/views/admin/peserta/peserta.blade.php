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
User
@endsection
@section('content')
<div class="container p-4">
  <h1 class="text-center">P E S E R T A</h1>

  <table class="table">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Event</th>
      <th>Opsi</th>
    </tr>
    @php $no=1 @endphp
    @foreach($peserta as $pesertas)
    <tr>
      <td>{{$no++}}</td>
      <td>{{$pesertas->name}}</td>
      <td>{{$pesertas->email}}</td>
      <td>{{$pesertas->nama}}</td>
      <td>
        <form class="" action="/admin/peserta/{{$pesertas->id}}" method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-sm btn-danger" name="button"> <i class="fa fa-trash"></i> Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
