@extends('layout.master')

@section('judul')
      Tambah Film
@endsection

@section('content')

<div class="d-flex">
    <div class="flex-shrink-0">
        <img src="{{ asset('uploads/' . $film->poster)}}" width="300px" height="500px" alt="">
    </div>
    <div class="flex-grow-1 d-flex flex-column justify-content-start ml-3">
        <div class="d-flex align-items-baseline">
            <h3 class="text-primary my-2">{{$film->judul}}</h3>
          <h3>  <span class="ml-2 text-muted">({{$film->tahun}})</span></h3>
        </div>
        <p>{{$film->ringkasan}}</p><br>
        <br>

        <hr>
        <h3>List Komentar</h3>
        @forelse ($film->review as $item)
        <div class="card mb-3">
        <div class="card-header">
            {{$item->owner->name}} 
            <span class="badge badge-dark ms-2"> {{$item->point}}/10</span>
        </div>
        <div class="card-body">
            <p class="card-text">{{$item->content}}</p>
        </div>
        </div>
        @empty
            <h6>Tidak ada Komentar</h6>
        @endforelse




        <hr>
        <form action="/review/{{$film->id}}" method="POST">
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
                <textarea name="content" class="form-control" placeholder="Isi komentar" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="point">Penilaian:</label>
                <select name="point" class="form-control" required>
                    <option value="" disabled selected>Pilih penilaian (1-10)</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
        </form>
        
    </div>
</div>





@endsection