@extends('layout.master')

@section('judul')
      Edit Film
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

    <form method="POST" action="/film/{{$film->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Judul:</label>
            <input type="text" class="form-control" value="{{$film->judul}}" name="judul">
        </div>

        <div class="form-group">
            <label>Ringkasan:</label>
            <textarea class="form-control" name="ringkasan" rows="4">{{$film->ringkasan}}</textarea>
        </div>

        <div class="form-group">
            <label>Tahun:</label>
            <input type="number" class="form-control" value="{{$film->tahun}}" name="tahun">
        </div>

        <div class="form-group">
            <label>Genre:</label>
            <select name="genre_id" class="form-control">
                <option>--Pilih Genre--</option>
                @forelse ($genre as $item)
                   @if ($item->id == $film->genre_id)
                   <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                   @else
                   <option value="{{$item->id}}" >{{$item->nama}}</option>
                   @endif
                @empty
                    <option value="">Tidak Genre Silahkan di tambahkan</option>
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label>Poster:</label>
            <input type="file" class="form-control-file" id="poster" name="poster" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">submit</button>
    </form>
</form>
</div>
@endsection
