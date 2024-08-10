@extends('layout.master')

@section('judul')
  Detail Genre
@endsection

@section('content')

<h1>{{$genre->nama}}</h1><br><br>
<div class="row">
@forelse ($genre->listFilm as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('uploads/'.$item->poster)}}" class="card-img-top" width="300px" height="500px" alt="...">
            <div class="card-body">
              <h2>{{$item->judul}}</h2>
              <a href="/film/{{$item->id}}" class="btn btn-primary btn-block">Read More</a>
            </div>
          </div>
    </div>
    
@empty
    <h3>Tidak Film Genre</h3>
@endforelse


@endsection