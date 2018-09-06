<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penginapan;
use App\Transaksi;
class PenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        protected $path;
    public function __construct(){
      $this->path = 'images/penginapan/';
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
      return view('admin.penginapan.create');
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

      $penginapan = new Penginapan;
      $penginapan->name = isset($request->name) ? $request->name : "";
      $penginapan->detail = isset($request->detail) ? $request->detail : "";
      $penginapan->alamat = isset($request->alamat) ? $request->alamat : "";
      $penginapan->fasilitas = isset($request->fasilitas) ? $request->fasilitas : "";
      $penginapan->harga = isset($request->harga) ? $request->harga : "";
      if (isset($request->path)){
        $name = sha1(strtotime(date('Y-m-d')).$request->path).'.'.$request->path->getClientOriginalExtension();
        $request->path->move($this->path,$name);
        $penginapan->path = $this->path.$name;
      }
      $penginapan->save();

      return redirect('penginapan');
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
        $penginapan = Penginapan::find($id);
        return view('admin.penginapan.create', compact('penginapan'));
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
        $penginapan = Penginapan::find($id);
        if (empty($penginapan))
            return redirect()->back();
        $penginapan->name = isset($request->name) ? $request->name : "";
        $penginapan->detail = isset($request->detail) ? $request->detail : "";
        $penginapan->alamat = isset($request->alamat) ? $request->alamat : "";
        $penginapan->fasilitas = isset($request->fasilitas) ? $request->fasilitas : "";
        $penginapan->harga = isset($request->harga) ? $request->harga : "";
        if (isset($request->path)){
            $name = sha1(strtotime(date('Y-m-d')).$request->path).'.'.$request->path->getClientOriginalExtension();
            $request->path->move($this->path,$name);
            $penginapan->path = $this->path.$name;
        }
        $penginapan->save();

        return redirect('penginapan');
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
        $transaksi = Transaksi::where('id_penginapan',$id)->first();
        if(empty($transaksi)){
            Penginapan::where('id', $id)->delete();session()->put('toast', ['success', 'item deleted']);
        } else {
            session()->put('toast', ['error', 'Item ini sudah memiliki transaksi']);
        }
        return redirect()->back();
    }
}
