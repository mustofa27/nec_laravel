<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Group;
use App\Program;
use App\Penginapan;
use App\Category;
use App\Artikel;
use App\Galeri;
use App\Pendaftar;
use App\Bukti;

use Mail;
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
    public function transaksi()
    {
        $data['title'] = 'Transaksi';
        $transaksis = Transaksi::where('transaksis.status', '!=', 'registering')
            ->orderBy('transaksis.id', 'desc')
            ->get();
        foreach ($transaksis as $transaksi) {
          $bukti = Bukti::where('id_transaksi',$transaksi->id)->first();
          if(empty($bukti)){
            $transaksi->path = "";
            $transaksi->pengirim = "";
          } else{
            $transaksi->path = $bukti->path;
            $transaksi->pengirim = $bukti->pengirim;
          }
        }
        $data['transaksi'] = $transaksis;
        return view('admin.home', compact('data'));
    }

    public function group()
    {
        $data['title'] = 'Group';
        $data['group'] = Group::all();
        return view('admin.group', compact('data'));
    }

    public function penginapan()
    {
        $data['title'] = 'Penginapan';
        $data['penginapan'] = Penginapan::all();
        return view('admin.penginapan', compact('data'));
    }

    
    public function program()
    {
        $data['title'] = 'Program';
        $data['program'] = Program::leftJoin('groups','groups.id','programs.id_group')
          ->select('programs.*','groups.name as group')
          ->get();
        return view('admin.program', compact('data'));
    }
    
    public function category()
    {
        $data['title'] = 'Category Article';
        $data['category'] = Category::all();
        return view('admin.category', compact('data'));
    }

    public function artikel()
    {
        $data['title'] = 'Artikel';
        $data['artikel'] = Artikel::leftJoin('categories', 'artikels.id_cat', 'categories.id')
          ->select('artikels.*', 'categories.name as category')
          ->orderBy('artikels.id', 'desc')->get();
        return view('admin.artikel', compact('data'));
    }

    public function galeri()
    {
        $data['title'] = 'Galeri';
        $data['galeri'] = Galeri::all();
        return view('admin.galeri', compact('data'));
    }

    public function pendaftar()
    {
        $data['title'] = 'Pendaftar';
        $data['pendaftar'] = Pendaftar::leftJoin('transaksis', 'transaksis.id', 'pendaftars.id_transaksi')
          ->select('pendaftars.*', 'transaksis.kode')->get();
        return view('admin.pendaftar', compact('data'));
    }

    /*public function subscription(){
        $data['title'] = 'Subscription';
        $subscriptions = Subscription::leftJoin('users', 'subscriptions.user_id','users.id')
            ->leftJoin('items', 'subscriptions.item_id','items.id')
            ->select('subscriptions.*', 'items.name as item', 'users.name as user')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('pages.general.subscription', compact('data', 'subscriptions'));
    }*/

    public function acceptBukti($id){
      $transaksi = Transaksi::find($id);
      if (!empty($transaksi)){
        $transaksi->status = 'accepted';
        $transaksi->save();
      }
      $pendaftar = Pendaftar::where('id_transaksi', $id)->get();
      foreach ($pendaftar as $p) {
        $data['pendaftar'] = $p;
        Mail::send('admin.email-selamat', $data, function($message) use ($pendaftar){
          $pendaftar = $pendaftar[0];
          $message->to($pendaftar->email, $pendaftar->nama)
              ->from('system@masuk-ptn.com','Tim Masuk PTN')
              ->subject('Tiket Try Out di MASUK PTN');
        });
      }
      return redirect()->back();
    }
    public function rejectBukti($id){
      $transaksi = Transaksi::find($id);
      if (!empty($transaksi)){
        $transaksi->status = 'rejected';
        $transaksi->save();
      }
      return redirect()->back();
    }
}
