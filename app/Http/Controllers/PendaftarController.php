<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Lokasi;
use App\Tryout;
use App\Product;
use App\Jurusan;
use App\Category;
use App\Artikel;
use App\Galeri;
use App\Pendaftar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('pendaftar.create');
    }
}
