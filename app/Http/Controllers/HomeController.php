<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pemesanan;
use App\Pembayaran;
use DB;
use App\Paket;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pemesanan=DB::table('pemesanans')
        ->join('pakets','pakets.id','=','pemesanans.id_paket')
        // ->join('kategoris','kategoris.id','=','pakets.id_kategori')
        ->where('status','=',1)
        ->get();
        $paket=Paket::get(['nama_paket','id']);
        $nama_paket=json_encode([$paket[0]['nama_paket'],$paket[1]['nama_paket'],$paket[2]['nama_paket'],]);
        $paket1=Pembayaran::where('id_pemesanan',$paket[0]['id'])->count();
        $paket2=Pembayaran::where('id_pemesanan',$paket[1]['id'])->count();
        $paket3=Pembayaran::where('id_pemesanan',$paket[2]['id'])->count();
        $data_transaksi=[$paket1,$paket2,$paket3];
        return view('home',compact('pemesanan','nama_paket','data_transaksi'));
    }
}