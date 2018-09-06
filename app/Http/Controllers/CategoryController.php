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

class CategoryController extends Controller
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
        return view('admin.kategori.create');
    }

    public function store(Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();
        return redirect('category');
    }

    public function edit($id)
    {
        //
        $category = Category::find($id);
        if (empty($category))
            return redirect()->back();
        $data['category'] = $category;
        return view('admin.kategori.create', compact('data'));
    }

    public function update(Request $request, $id)
    {
        //
        $category = Category::find($id);
        if (empty($category))
            return redirect()->back();

        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();
        return redirect('category');
    }

    public function destroy($id){
        Category::where('id', $id)->delete();
        session()->put('toast', ['success', 'item deleted']);
        return redirect()->back();
    }
}
