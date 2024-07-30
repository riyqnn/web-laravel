<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }
    
    public function register() {
        return view('page.register');
    }

    public function utama(Request $request) {
        dd($request);

}


}