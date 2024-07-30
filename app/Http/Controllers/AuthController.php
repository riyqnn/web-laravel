<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register() {
    return view('page.register');
   }

    public function utama(Request $request) {
       $namaDepan = $request->input('fname');
       $namaBelakang = $request->input('lname');

       return view('page.welcome',['namaDepan'=>$namaDepan, 'namaBelakang' => $namaBelakang]);
    }
};
