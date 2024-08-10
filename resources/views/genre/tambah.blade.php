@extends('layout.master')

@section('judul')
  Halaman Tambah Genre
@endsection

@section('content')

<form action="/genre" method="POST">
  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @csrf
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control"> 
    </div>
    @error('nama')
       <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
