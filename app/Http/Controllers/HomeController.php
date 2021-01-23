<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Transaksi;
use DB;
use App\Paket;
use App\Silver;
use App\Gold;
use App\Platinum;
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
        $transaksi=DB::table('transaksis')
        ->join('pakets','pakets.id','=','transaksis.id_paket')
        ->join('kategoris','kategoris.id','=','pakets.id_kategori')
        ->where('status','=',1)
        ->get();
        $paket=Paket::get(['nama_paket','id']);
        //return $paket;
        $nama_paket=json_encode([$paket[0]['nama_paket'],$paket[1]['nama_paket'],$paket[2]['nama_paket'],]);
        $paket1=Transaksi::where('id_paket',$paket[0]['id'])->count();
        $paket2=Transaksi::where('id_paket',$paket[1]['id'])->count();
        $paket3=Transaksi::where('id_paket',$paket[2]['id'])->count();
        $data_transaksi=[$paket1,$paket2,$paket3];
        // return $transaksi;
        // die;
        // $count=Transaksi::all();
        return view('home',compact('transaksi','nama_paket','data_transaksi'));
    }
    public function list()
    {
        $silver=Silver::all();
        $gold=Gold::all();
        $platinum=Platinum::all();
        return view('dashboard',compact('silver','gold','platinum'));
    }
}