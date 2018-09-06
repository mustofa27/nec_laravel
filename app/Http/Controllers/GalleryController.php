<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
class GalleryController extends Controller
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
      return view('admin.galeri.create');
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

      $galeri = new Galeri;
      $galeri->name = isset($request->name) ? $request->name : "";
      $galeri->desc = isset($request->deskripsi) ? $request->deskripsi : "";
      if (isset($request->path)){
        $name = sha1(strtotime(date('Y-m-d')).$request->path).'.'.$request->path->getClientOriginalExtension();
        $request->path->move($this->path,$name);
        $galeri->path = $this->path.$name;
      }
      $galeri->save();

      return redirect('galeri');
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
        $galeri = Galeri::find($id);
        return view('admin.galeri.create', compact('galeri'));
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
        $galeri = Galeri::find($id);
        if (empty($galeri))
            return redirect()->back();
        $galeri->name = isset($request->name) ? $request->name : "";
        $galeri->desc = isset($request->deskripsi) ? $request->deskripsi : "";
        if (isset($request->path)){
            $name = sha1(strtotime(date('Y-m-d')).$request->path).'.'.$request->path->getClientOriginalExtension();
            $request->path->move($this->path,$name);
            $galeri->path = $this->path.$name;
        }
        $galeri->save();
        return redirect('galeri');
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
      Galeri::where('id', $id)->delete();
      return redirect('galeri');
    }
}
