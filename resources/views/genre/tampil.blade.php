@extends('layout.master')

@section('judul')
  Halaman List Genre
@endsection

@section('content')

<a href="/genre/create" class="btn btn-primary btn-sm">Tambah</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($genre as $key => $value)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $value->nama }}</td>
            <td>
              <form action="/genre/{{$value->id}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="/genre/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                <a href="/genre/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            </td>
          </tr>
        @empty
          <tr>
            <td>Tidak Ada Data</td>
          </tr>
        @endforelse
    </tbody>
</table>
@endsection