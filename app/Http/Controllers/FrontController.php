<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftar;
use App\Transaksi;
use App\Artikel;
use App\Bukti;
use App\Program;
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

  public function all_article(){
    $all_article = Artikel::orderBy('updated_at', 'desc')->get();
    return view('front.all_article', compact('all_article'));
  }  

  public function all_galery(){
    $all_galery = Galeri::orderBy('updated_at', 'desc')->get();
    return view('front.all_galery', compact('all_galery'));
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

	public function daftarpengguna(Request $request){
		$product = Product::find($request->product);
		if (empty($product)){
			session()->put('toast', ['error', 'paket tidak tersedia, silahkan pilih produk yang ada']);
			return redirect()->back();
		}
		$to = Tryout::where('id', $product->id_tryout)->first();
		if (empty($to)){
			session()->put('toast', ['error', 'try out tidak tersedia, silahkan pilih produk yang ada']);
			return redirect()->back();
		}
		// dd($product);
		$transaksi = new Transaksi;
		$transaksi->tanggal = date('Y-m-d');
		$transaksi->status = 'registering';
		$transaksi->kode = 0;
		$grand_total = ($product->jumlah_peserta * $to->harga);
    $transaksi->grand_total = $grand_total - ($product->diskon * $grand_total/100);
		$transaksi->id_product = $request->product;
		$transaksi->save();
		$jurusan = Jurusan::orderBy('name', 'asc')->get();
		return view('front.daftar-pengguna', compact('jurusan', 'product', 'transaksi'));
	}
	public function daftarkan(Request $request){
		if (session()->get('registered')){
			session()->forget('registered');
			// return redirect('daftar');
		}
		$product = Transaksi::find($request->id_transaksi);
    if (empty($product))
    	return redirect('daftar');
    if (isset($request->path_foto)){
        foreach($request->path_foto as $p){
            if ($p->getClientSize() > 2048000 || $p->getClientSize() == 0){
                session()->put('toast', ['error', 'ukuran file terlalu besar. maksimal 2MB']);
                return redirect('daftar');
            }
        }
    }
    if ($product->status == 'registering'){
			for($i = 0; $i < count($request->name); $i++){
					$pendaftar = new Pendaftar;
					$pendaftar->nama = $request->name[$i];
					$pendaftar->tempat_lahir = $request->tempat_lahir[$i];
					$pendaftar->tanggal_lahir = date('Y-m-d', strtotime($request->tanggal_lahir[$i]));
					$pendaftar->alamat = $request->alamat[$i];
					$pendaftar->email = $request->email[$i];
					$pendaftar->hp = $request->hp[$i];
					$pendaftar->sekolah = $request->sekolah[$i];
					$pendaftar->fb = $request->fb[$i];
					$pendaftar->instagram = $request->ig[$i];
					$pendaftar->twitter = '';
					$pendaftar->line = $request->line[$i];
					$pendaftar->wa = $request->wa[$i];
					$pendaftar->jenis_sbmptn = $request->jenis_sbmptn[$i];
					$pendaftar->id_jurusan = 1;
					$pendaftar->id_transaksi = $request->id_transaksi;
					$pendaftar->path_foto = '';
					$pendaftar->save();
					if (isset($request->path_foto[$i])){
		          if (isset($request->path_foto[$i])){
		          	// dd($request->path_foto[$i]);
		          	// dd($request->path_foto[$i]->getClientOriginalExtension());
		           	$name = sha1(strtotime(date('Y-m-d')).$pendaftar->id).'.'.$request->path_foto[$i]->getClientOriginalExtension();
		            $request->path_foto[$i]->move($this->path,$name);
		            $pendaftar->path_foto = $this->path.$name;
		          }
		        
		      }
					$pendaftar->save();
					$kodeSoal = 11;
					switch ($request->jenis_sbmptn[$i]) {
						case 'ipa':
							$kodeSoal = 11;
							break;
						case 'ips':
							$kodeSoal = 13;
							break;
						case 'ipc':
							$kodeSoal = 15;
							break;
						
						default:
							# code...
							break;
					}
					$pendaftar->nomor_peserta = $kodeSoal . $this->generateCode($product->id_product, 2).$this->generateCode($pendaftar->id,4);
				$pendaftar->save();
        if ($product->kode == 0)
          $product->kode = $pendaftar->nomor_peserta;
			}
		}
		
		$product->status = 'registered';
		$product->save();
		$pendaftars = Pendaftar::where('id_transaksi', $product->id)->get();
    $this->kirimEmail($pendaftars, $product->grand_total);
		return view('front.daftar-berhasil', compact('pendaftars', 'product'));
		// return redirect('pendaftaran-berhasil');
	}
  function kirimEmail($pendaftars, $nominal){
    foreach ($pendaftars as $p) {
      $data['pendaftar'] = $p;
      $data['nominal'] = $nominal;
        $pendaftar = $p;
        Mail::send('front.email-bayar', $data, function($message) use ($pendaftar){
          $message->to($pendaftar->email, $pendaftar->nama)
              ->from('system@masuk-ptn.com','Tim Masuk PTN')
              ->subject('Nomor Peserta');
        });
      }
  }
	public function berhasil(){
		return view('front.daftar-berhasil');
	}
  public function konfirmasiForm(){
    return view('front.konfirmasi');
  }
  public function konfirmasi(Request $request){
    $peserta = Pendaftar::where('nomor_peserta', $request->nomor_peserta)->first();
    if (empty($peserta)){
      session()->put('toast', ['error', 'nomor peserta tidak diketahui']);
      return redirect()->back();
    }
    $transaksi = Transaksi::find($peserta->id_transaksi);
    if (empty($transaksi)){
      session()->put('toast', ['error', 'transaksi tidak dikenali']);
      return redirect()->back();
    }

    $bukti = Bukti::where('id_transaksi',$peserta->id_transaksi)->first();
    if(empty($bukti)){
      $bukti = new Bukti;
    }
    $bukti->desc = "desc";
    $bukti->id_transaksi = $peserta->id_transaksi;
    $bukti->pengirim = $request->pengirim;
    if (isset($request->bukti)){
      $name = sha1(strtotime(date('Y-m-d')).$peserta->id_transaksi).'.'.$request->bukti->getClientOriginalExtension();
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
