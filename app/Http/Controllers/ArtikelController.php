<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Artikel;
class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $path;
    public function __construct(){
      $this->path = 'images/artikel/';
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $categories = Category::orderBy('name', 'asc')->get();
      return view('admin.artikel.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      // dd($request->all());
      $artikel = Artikel::where('url', $request->url)->first();
      if (!empty($artikel))
        return redirect()->back();

      $artikel = new Artikel;
      $artikel->judul = $request->judul;
      $artikel->isi = $request->isi;
      $artikel->url = $request->url;
      $artikel->id_cat = $request->id_cat;
      if (isset($request->foto)){
        $name = sha1(strtotime(date('Y-m-d')).$request->url).'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move($this->path,$name);
        $artikel->img = $this->path.$name;
      }
      $artikel->save();

      return redirect('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      $artikel = Artikel::find($id);
      $categories = Category::orderBy('name', 'asc')->get();
      return view('admin.artikel.create', compact('artikel', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      $artikel = Artikel::find($id);
      if (empty($artikel))
        return redirect()->back();
      $artikel->judul = $request->judul;
      $artikel->isi = $request->isi;
      $artikel->url = $request->url;
      $artikel->id_cat = $request->id_cat;
      if (isset($request->foto)){

        $name = sha1(strtotime(date('Y-m-d')).$request->url).'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move($this->path,$name);
        $artikel->img = $this->path.$name;
      }
      $artikel->save();

      return redirect('artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      Artikel::where('id', $id)->delete();
      return redirect()->back();
    }
}
