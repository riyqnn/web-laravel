@extends('layout.master')

@section('judul')
  Halaman Edit Kategori
@endsection

@section('content')

<form action="/kategori/{{$cast->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control"> 
    </div>
    @error('nama')
     <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <div class="form-group">
      <label>Umur</label>
      <input type="number" name="umur" class="form-control"> 
      </div>
    @error('umur')
     <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <div class="form-group">
      <label>Bio</label>
      <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
      </div>
    @error('bio')
     <div class="alert alert-danger">{{ $message }}</div>
    @enderror
     <button type="submit" class="btn btn-primary">Submit</button>
</form>

  @endsection