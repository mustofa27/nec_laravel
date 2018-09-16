<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftar;
use App\Transaksi;
use App\Artikel;
use App\Bukti;
use App\Program;
use App\ProgramTransaksi;
use App\Penginapan;
use App\Galeri;

use Mail;
use PDF;
class FrontController extends Controller
{
    //
	protected $path;
  protected $pathBukti;
  public function __construct(){
      $this->path = 'images/pendaftar/';
      $this->pathBukti = 'images/bukti/';
  }
	public function home(){
    $artikel = Artikel::orderBy('id', 'desc')
      ->limit(4)
      ->get();
    $galeri = Galeri::orderBy('id', 'desc')
      ->limit(8)
      ->get();
    $program = Program::where('status', 'aktif')
      ->orderBy('id', 'desc')
      ->get();
		return view('front.home', compact('artikel', 'galeri', 'program'));
	}

  public function article($url){
    $article = Artikel::where('url','like', '%'.$url.'%')->first();
    if (empty($article)){
      $article = new Artikel;
      $article->judul = "Tidak ditemukan";
    }
    $webTitle = $article->judul;
    return view('front.article', compact('article', 'webTitle'));
  }

	public function daftar(){
		$program = Program::orderBy('id_group', 'asc')->leftJoin('groups', 'programs.id_group', 'groups.id')
      ->select('programs.*', 'groups.name as group')->get();
    $penginapan = Penginapan::all();
		session()->forget('registered');
		return view('front.daftar', compact('program','penginapan'));
	}

  public function daftarByLokasi($id_lokasi){
    $jurusan = Jurusan::orderBy('name', 'asc')->get();
    $lokasi = Lokasi::orderBy('name', 'asc')->join('tryouts', 'tryouts.id_lokasi', 'lokasis.id')->select('lokasis.*')->get();
    $to = Tryout::where('id_lokasi',$id_lokasi)->where('tanggal_pelaksanaan', '>', date('Y-m-d'))
      ->orderBy('tanggal_pelaksanaan', 'desc')->get();
    session()->forget('registered');
    return view('front.daftar', compact('jurusan', 'lokasi', 'id_lokasi', 'to'));
  }

	public function daftarkan(Request $request){
    if (empty($request->id_program))
    	return redirect('daftar');
    $count = sizeof($request->addmore);
    $jumlah_pendaftar = $count/3 + 1;
    $total_harga = 0;
    foreach ($request->id_program as $id) {
      $current = Program::find($id);
      $total_harga += $current->harga;
    }
    $penginapan = Penginapan::find($request->id_penginapan);
    $total_harga += $penginapan->harga;
    $product = new Transaksi;
    $product->tanggal_mulai = $request->course_date_start;
    $product->status = "registered";
    $product->kode = "ongoingcreate";
    $product->grand_total = $total_harga * $jumlah_pendaftar + 25000;
    $product->id_penginapan = $request->id_penginapan;
    $product->save();
    $idt = strval($product->id);
    $strlen = strlen($idt);
    if ($strlen = 1) {
        $id_new = "0000" . (string) ($idt);
    } else if ($strlen = 2) {
        $id_new = "000" . (string) ($idt);
    } else if ($strlen = 3) {
        $id_new = "00" . (string) ($idt);
    } else if ($strlen = 4) {
        $id_new = "0" . (string) ($idt);
    }
    $kode_transaksi = "NEC" . date('dmy') . (string) ($id_new);
    $product->kode = $kode_transaksi;
    $product->save();
    foreach ($request->id_program as $id) {
      $pt = new ProgramTransaksi;
      $pt->id_program = $id;
      $pt->id_transaksi = $product->id;
      $pt->save();
    }
    $pendaftar = new Pendaftar;
    $pendaftar->nama = $request->pendaftar_name;
    $pendaftar->email = $request->pendaftar_email;
    $pendaftar->hp = $request->pendaftar_no_hp;
    $pendaftar->jenis_kelamin = $request->pendaftar_jenis_kelamin;
    $pendaftar->kota_asal = $request->pendaftar_kota_asal;
    $pendaftar->tempat_lahir = $request->pendaftar_tempat_lahir;
    $pendaftar->tgl_lahir = $request->pendaftar_tgl_lahir;
    $pendaftar->institusi = $request->pendaftar_institusi;
    $pendaftar->id_transaksi = $product->id;
    $pendaftar->save();
    for($i = 0; $i < $count; $i+=3) {
      $p = new Pendaftar;
      $p->nama = $request->addmore[$i];
      $p->email = "";
      $p->hp = $request->addmore[$i+2];
      $p->jenis_kelamin = "";
      $p->kota_asal = $request->addmore[$i+1];
      $p->tempat_lahir = "";
      $p->tgl_lahir = "1990-01-01";
      $p->institusi = "";
      $p->id_transaksi = $product->id;
      $p->save();
    }
		$pendaftar = Pendaftar::where('id_transaksi', $product->id)->where('email', '!=', '')->first();
    $pendaftars = Pendaftar::where('id_transaksi', $product->id)->get();
    //$this->kirimEmail($pendaftars, $product->grand_total);
		return view('front.daftar-berhasil', compact('pendaftars', 'product'));
		// return redirect('pendaftaran-berhasil');
	}
  function kirimEmail($product, $pendaftar, $nominal){
    $data['pendaftar'] = $pendaftar;
    $data['nominal'] = $nominal;
    Mail::send('front.email-bayar', $data, function($message) use ($pendaftar,$product){
      $message->to($pendaftar->email, $pendaftar->nama)
          ->from('necinstitute123@gmail.com','Newcastle English Institute')
          ->subject('Kode Transaksi');
    });
  }
	public function berhasil(){
		return view('front.daftar-berhasil');
	}
  public function konfirmasiForm(){
    return view('front.konfirmasi');
  }
  public function konfirmasi(Request $request){
    $transaksi = Transaksi::where('kode', '=', $request->kode)->first();
    if (empty($transaksi)){
      session()->put('toast', ['error', 'transaksi tidak dikenali']);
      return redirect()->back();
    }

    $bukti = Bukti::where('id_transaksi',$transaksi->id)->first();
    if(empty($bukti)){
      $bukti = new Bukti;
    }
    $bukti->desc = "desc";
    $bukti->id_transaksi = $transaksi->id;
    if (isset($request->bukti)){
      $name = sha1(strtotime(date('Y-m-d')).$transaksi->id).'.'.$request->bukti->getClientOriginalExtension();
      $request->bukti->move($this->pathBukti,$name);
      $bukti->path = $this->pathBukti.$name;
    }
    $bukti->save();
    session()->put('toast', ['success', 'Upload berhasil. Bukti akan divalidasi maksimal 12 jam setelah upload, harap jangan upload ulang. Jika lebih dari 12 jam belum terkonfirmasi, silahkan hubungi CP kami.']);
    return redirect()->back();
  }

  public function cekForm(){
    return view('front.cek-status');
  }

  public function cek(Request $request){
    $peserta = Pendaftar::where('nomor_peserta', $request->nomor_peserta)->first();
    if (empty($peserta)){
      session()->put('toast', ['error', 'Nomor Peserta tidak ditemukan']);
    } else {
      $transaksi = Transaksi::find($peserta->id_transaksi);
      if (empty($transaksi)){
        session()->put('toast', ['error', 'Transaksi tidak ditemukan']);
      }
      return view('front.cek-result', compact('peserta', 'transaksi'));
    }
    return redirect()->back();
  }

  public function downloadTiket($nomor_peserta){
    $pendaftar = Pendaftar::where('pendaftars.nomor_peserta', $nomor_peserta)
      ->leftJoin('transaksis', 'pendaftars.id_transaksi', 'transaksis.id')
      ->select('pendaftars.*', 'transaksis.status')
      ->first();
    //dd($pendaftar);
    if (empty($pendaftar)){
      session()->put('toast', ['error', 'nomor peserta tidak ditemukan']);
    } else {
      if ($pendaftar->status =='accepted'){
        $pdf = PDF::loadView('front.ticket', $pendaftar)
          ->setPaper([0,0, 680.315, 340.157], 'potrait');
        return $pdf->download('tiket.pdf');
      } else if ($pendaftar->status == 'rejected'){
        session()->put('toast', ['error', 'transaksi ditolak']);
      } else {
        session()->put('toast', ['error', 'terjadi kesalahan, silahkan hubungi admin']);
      }
    }
  }

	function generateCode($code, $length = 6){
    $code = (string)$code;
    $codeLength = $length;
    $frontDigit = $codeLength - strlen($code);
    $zeroDigit = '';
    for ($i=0; $i < $frontDigit; $i++) { 
      $zeroDigit .= '0';
    }
    return $zeroDigit.$code;
  }

  function randomNumber($length = 8){
    $number = '';
    for($i = 0; $i < $length; $i++){
      $number .= rand(0, 9);
    }
    return $number;
  }
  	public function hasil(){
		return view('front.coming_soon');
	}
	public function pembahasan(){
		return view('front.coming_soon');
	}
}
