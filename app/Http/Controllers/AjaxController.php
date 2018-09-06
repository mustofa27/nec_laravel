<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lokasi;
use App\Tryout;
use App\Product;
use App\Jurusan;
class AjaxController extends Controller
{
    //
	public function daftarData(){
		$lokasi = Lokasi::orderBy('name', 'asc')->get();
		$product = Product::orderBy('name', 'asc')->get();
		$to = Tryout::orderBy('tanggal_pelaksanaan', 'asc')->get();
		return [
		'lokasi' => $lokasi,
		'product' => $product,
		'to' => $to
		];
	}
	public function to($id_lokasi){
		$to = Tryout::where('id_lokasi', $id_lokasi)->orderBy('tanggal_pelaksanaan', 'desc')->get();
		return $to;
	}

	public function product($id_to){
		$product = Product::where('id_tryout', $id_to)->orderBy('name', 'asc')->get();
		return $product;
	}
}
