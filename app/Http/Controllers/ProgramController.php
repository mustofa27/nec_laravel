<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramTransaksi;
use App\Program;
use App\Category;
use App\Artikel;
use App\Galeri;
use App\Group;
use App\Pendaftar;

class ProgramController extends Controller
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
        $data['group'] = Group::all();
        return view('admin.program.create', compact('data'));
    }

    public function edit($id)
    {
        //
        $program = Program::find($id);
        if (empty($program))
            return redirect()->back();
        $data['group'] = Group::all();
        $data['program'] = $program;
        return view('admin.program.create', compact('data'));
    }

    public function update(Request $request, $id)
    {
        //
        $program = Program::find($id);
        if (empty($program))
            return redirect()->back();

        $program->name = $request->name;
        $program->detail = $request->detail;
        $program->harga = $request->harga;
        $program->tipe = $request->tipe;
        $program->status = $request->status;
        $program->durasi = $request->durasi;
        $program->tanggal_mulai = $request->tanggal_mulai;
        $program->tanggal_berakhir = $request->tanggal_berakhir;
        $program->id_group = $request->id_group;
        $program->save();
        return redirect('program');
    }

    public function destroy($id){
        $transaksi = ProgramTransaksi::where('id_program', $id)->first();
        if(empty($transaksi)){
            Program::where('id', $id)->delete();
            session()->put('toast', ['success', 'item deleted']);
        } else {
            session()->put('toast', ['error', 'Item ini sudah memiliki transaksi']);
        }
        return redirect()->back();
    }

    public function store(Request $request){
        $program = new Program;
        $program->name = $request->name;
        $program->detail = $request->detail;
        $program->harga = $request->harga;
        $program->tipe = $request->tipe;
        $program->status = $request->status;
        $program->durasi = $request->durasi;
        $program->tanggal_mulai = $request->tanggal_mulai;
        $program->tanggal_berakhir = $request->tanggal_berakhir;
        $program->id_group = $request->id_group;
        $program->save();
        return redirect('program');
    }
}
