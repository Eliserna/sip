<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;
use App\Pemesanan;
use App\Pembayaran;
use Fpdf;
use App\Exports\TransaksiExport;
class TransaksiController extends Controller
{
    public function index()
    {
        $pemesanan=Pemesanan::where('status','0')->get();
        return view('transaksi.pemesanan',compact('pemesanan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'qty'=>'required'
        ]);
        $pemesanan = Pemesanan::where('id_user',auth()->user()->id);
        $data = $request->except('submit');
        $data['id_user'] = auth()->user()->id;
        Pemesanan::create($data);
        return redirect()->route('transaksi.index');
    }
    public function destroy($id)
    {
        $pemesanan=Pemesanan::findOrFail($id);
        if (!$pemesanan) {
            return redirect()->back();
        }
        $pemesanan->delete();
        return redirect()->route('transaksi.index');
    }
    public function update()
    {
        $pemesanan=Pemesanan::where('status','0');
        $pemesanan->update(['status'=>'1']);
        return redirect()->back();
    }
    public function laporan()
    {
        $pdf = new Fpdf("L", "cm", "A4");
        $pdf::SetMargins(4,4,3);
        $pdf::AddPage();
        $pdf::image('inovindo.png', 10, 5, 25, 25);
        $pdf::SetFont('Arial', 'B', 18);
        $pdf::Cell(185, 7, 'Laporan Pemesanan Paket', 0, 1, 'C');
        $pdf::SetFont('Arial', '', 10);
        $pdf::Cell(185, 5," inovindocorp@gmail.com 08562251196 www.inovindo.co.id ", 0, 1,'C');
        $pdf::Line(10, 30, 190, 30);
        $pdf::Line(10, 31, 190, 31);
        $pdf::Cell(30, 10, '', 0, 1);
        $pdf::SetFont('Arial', 'B', 10);
        $pdf::Cell(185, 5, '', 0, 0,'C');
        $pdf::Cell(30, 10,'', 0, 1);
        $pdf::Cell(10, 7,  'No', 1, 0);
        $pdf::Cell(30, 7, 'Tanggal', 1, 0);
        $pdf::Cell(32, 7,  'Customer', 1, 0);
        $pdf::Cell(35, 7,  'Paket', 1, 0);
        $pdf::Cell(29, 7, 'Total', 1,0);
        $pdf::Cell(30, 7, 'DP', 1,0);
        $pdf::Cell(30, 7, 'Sisa', 1,1);
        $pemesanan=Pemesanan::where('status','1')->get();
        $no=1;
        foreach($pemesanan as $item){
            $pdf::Cell(10, 7, $no, 1, 0);
            $pdf::Cell(30, 7, \Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %b %Y'), 1,0);
            $pdf::Cell(32, 7, $item->user->name, 1, 0);
            $pdf::Cell(35, 7, $item->paket->nama_paket, 1, 0);
            $total=str_replace('.','',$item->paket->harga_paket);
            $pdf::Cell(29, 7, "Rp.".number_format($total*$item->qty).",-", 1,0);
            $dp=str_replace('.','',$total*75/100);
            $pdf::Cell(30, 7, "Rp.".number_format($dp).",-", 1,0);
            $sisa=str_replace('.','',$total-$dp);
            $pdf::Cell(30, 7, "Rp.".number_format($sisa).",-", 1,1);
            $no++;
        }
        $pdf::Output();
        exit;
    }
    public function excel()
    {
        return(new TransaksiExport)->download('laporan_pemesanan_paket.xlsx');
    }
    public function bayar()
    {
        $pemesanan = Pembayaran::latest()->get();
        $pemesanan=Pemesanan::where('status','1')->where('id_user',auth()->user()->id)->get();
        return view('transaksi.pembayaran',compact('pemesanan'));
    }
     public function Uploadbukti()
    {
        $pemesanan = Pemesanan::where('id_user',auth()->user()->id)->get();
        return view('transaksi.uploadpembayaran',compact('pemesanan'));
    }
    public function upload(Request $request)
    { 
        $nm = $request->file('file');
        $namaFile = $nm->getClientOriginalName();
        $dtUpload = new Pembayaran;
        $dtUpload->id_pemesanan = $request->id;
        $dtUpload->img = $namaFile;
        $nm->move(public_path().'/img',$namaFile);
        $dtUpload->save();
        return redirect()->route('transaksi.bayar')->with('pesan','File Berhasil di Upload');
    }
    public function UploadPelunasan()
    {
        $pemesanan = Pemesanan::where('id_user',auth()->user()->id)->get();
        return view('transaksi.uploadpelunasan',compact('pemesanan'));
    }
    public function Pelunasan(Request $request)
    { 
        $nm = $request->file('file');
        $namaFile = $nm->getClientOriginalName();
        $dtUpload = Pembayaran::where('id_pemesanan',$request->id);
        $data = [
            'pelunasan'=>$namaFile
        ];
        // $dtUpload->id_pemesanan = $request->id;
        // $dtUpload->pelunasan = $namaFile;
        $nm->move(public_path().'/img',$namaFile);
        $dtUpload->update($data);
        return redirect()->route('transaksi.bayar')->with('pesan','File Berhasil di Upload');
    }
}