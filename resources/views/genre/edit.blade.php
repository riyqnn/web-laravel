@extends('layout.master')

@section('judul')
  Halaman Edit Kategori
@endsection

@section('content')

<form action="/genre/{{$genre->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" value="{{$genre->nama}}" class="form-control"> 
    </div>
    @error('nama')
     <div class="alert alert-danger">{{ $message }}</div>
    @enderror
     <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection