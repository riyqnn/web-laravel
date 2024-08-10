@extends('layout.master')

@section('judul')
      Tambah Film
@endsection

@section('content')

<a href="/film/create" class="btn btn-primary btn-sm">Tambah</a><br><br>

<div class="row">
    @forelse ($film as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('uploads/'.$item->poster)}}" class="card-img-top" width="300px" height="500px" alt="...">
            <div class="card-body">
              <h2>{{$item->judul}}</h2>
              <span class="badge badge-success">{{$item->genre->nama}}</span>
              <a href="/film/{{$item->id}}" class="btn btn-primary btn-block">Read More</a>
              @auth
              <div class="row my-2">
                <div class="col">
                  <a href="/film/{{$item->id}}/edit" class="btn btn-info btn-block">Edit</a>
                </div>
                <div class="col">
                  <form action="/film/{{$item->id}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Delete" class="btn btn-danger btn-block">
                </div>
               </div>    
              @endauth
            </div>
          </div>
    </div>
    @empty
        <h1>Tidak ada Poster </h1>
    @endforelse
    
</div>
@endsection