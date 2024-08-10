@extends('layout.master')

@section('judul')
      Tambah Film
@endsection

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/film" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul">
        </div>

        <div class="form-group">
            <label for="ringkasan">Ringkasan:</label>
            <textarea class="form-control" id="ringkasan" name="ringkasan" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="tahun">Tahun:</label>
            <input type="number" class="form-control" id="tahun" name="tahun">
        </div>

        <div class="form-group">
            <label>Genre:</label>
            <select name="genre_id" class="form-control">
                <option value="">--Pilih Genre--</option>
                @forelse ($genre as $item)
                   <option value="{{$item->id}}">{{$item->nama}}</option>
                @empty
                    <option value="">Tidak Genre Silahkan di tambahkan</option>
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label for="poster">Poster:</label>
            <input type="file" class="form-control-file" id="poster" name="poster" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">submit</button>
    </form>
</form>
</div>
@endsection
