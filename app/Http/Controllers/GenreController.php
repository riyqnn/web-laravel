<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\genre;

class GenreController extends Controller
{
    public function create () {
        return view('genre.tambah');
     }

     public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        DB::table('genre')->insert([
            "nama" => $request["nama"],
        ]);
        return redirect('/genre');
    }

    public function index() {

        $genre = DB::table('genre')->get();
        //dd($kategori);
        return view('genre.tampil', ['genre'=>$genre]);
        
    }

    public function show($id) {
        $genre = Genre::find($id);

        return view('genre.detail', ['genre' => $genre]);
    }

    public function edit($id) {
        $genre = DB::table('genre')->where('id', $id)->first();

        return view('genre.edit', ['genre' => $genre]);
        
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
        ]);

        DB::table('genre')
            ->where('id', $id)
            ->update(
                [
                    'nama' =>$request->nama,
                ],
                
            );

        return redirect('/genre');
    }

    public function destroy($id) {

        DB::table('genre')->where('id', $id)->delete();
        
        return redirect('/genre');

    }

    
    
}
