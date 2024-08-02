<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CastController extends Controller
{
    public function create () {
       return view('kategori.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio'  => 'required'
        ]);
        DB::table('cast')->insert([
            "nama" => $request["nama"],
            "umur" => $request["umur"],
            "bio"  => $request["bio"],
        ]);
        return redirect('/cast');
    }

    public function index() {

        $kategori = DB::table('cast')->get();
        //dd($kategori);
        return view('kategori.tampil', ['cast'=>$kategori]);
    }

    public function show($id) {
        $kategori = DB::table('cast')->where('id', $id)->first();
        return view('kategori.detail', ['cast' => $kategori]);
    }
    

    public function edit($id) {
        $kategori = DB::table('cast')->where('id', $id)->first();

        return view('kategori.edit', ['cast' => $kategori]);
        
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio'  => 'required',
        ]);

        DB::table('cast')
            ->where('id', $id)
            ->update(
                [
                    'nama' =>$request->nama,
                    'umur' => $request->umur,
                    'bio'  =>$request->bio
                ],
                
            );

        return redirect('/cast');
    }

    public function destroy($id) {
        DB::table('cast')->where('id',$id)->delete();

        return redirect('/cast');
    }


}