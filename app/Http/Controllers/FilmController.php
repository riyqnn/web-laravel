<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use File;


class FilmController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);

    }


    public function index () {
        $film = Film::all();
        return view('film.tampil',['film' => $film]);
    }

    public function create () {
        $genre = genre::all();
        return view('film.tambah',['genre'=> $genre]);
    }

    public function store (Request $request) {
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required|mimes:pdf,xlx,csv,jpg,png|max:2048',
            'genre_id' => 'required',
        ]);
      
        $fileposter = time().'.'.$request->poster->extension();  
       
        $request->poster->move(public_path('uploads'), $fileposter);

        $film = new film;

        $film->judul = $request->input('judul');
        $film->ringkasan = $request->input('ringkasan');
        $film->tahun = $request->input('tahun');
        $film->genre_id = $request->input('genre_id');
        $film->poster = $fileposter;

        $film->save();

        return redirect('/film');
    }

    public function show (string $id) {
        $film = Film::find($id);
        return view('film.detail', ['film' => $film]);
    }

    public function edit (string $id) {
        $film = Film::find($id);
        $genre = genre::all();
        return view('film.edit',['film' => $film, 'genre' => $genre]);

    }

    public function update (Request $request,string $id) {
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'mimes:pdf,xlx,csv,jpg,png|max:2048',
            'genre_id' => 'required',
        ]); 

        $film = Film::find($id);

        if($request->has('poster')) {
            file::delete('uploads/'. $film->poster);

            $fileposter = time().'.'.$request->poster->extension();  
       
            $request->poster->move(public_path('uploads'), $fileposter);

            $film->poster = $fileposter;
        }

        $film->judul = $request->input('judul');
        $film->ringkasan = $request->input('ringkasan');
        $film->tahun = $request->input('tahun');
        $film->genre_id = $request->input('genre_id');
        $film->save();
        return redirect('/film');
    }

    public function destroy(string $id) {

    $film = Film::find($id); 

    File::delete('uploads/'. $film->poster); 

    $film->delete();

    return redirect('/film');

    }

}


