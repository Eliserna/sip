<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Transaksi;
use DB;
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
        // return view('home');
        // $transaksi=DB::table('transaksis')
        // ->join('pakets','pakets.id','=','transaksis.id_paket')
        // ->join('kategoris','kategoris.id','=','pakets.id_kategori')
        // ->where('status','=',1)
        // ->get();
        // return $transaksi;
        // die;
        $total=Transaksi::all();
        return view('home',compact('transaksi','total'));
    }
}