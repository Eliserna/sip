<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Paket;
use App\DetailPaket;
use App\Imports\PaketImport;
use Excel;
class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket=Paket::all();
        return view('paket.index',compact('paket'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paket.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket'=>'required|min:4',
            'harga_paket'=>'required',
            'perpanjangan'=>'required',
        ]);
        Paket::create($request->all());
        return redirect()->route('paket.index')->with('pesan','Data Paket Berhasil di Tambahkan');
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
        $paket=Paket::findOrFail($id);
        return view('paket.update',compact('paket'));
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
        $request->validate([
            'nama_paket'=>'required|min:4',
            'harga_paket'=>'required',
            'perpanjangan'=>'required',
        ]);
        $paket=Paket::find($id);
        $paket->update($request->all());
        return redirect()->route('paket.index')->with('pesan','Data Paket Berhasil di Update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket=Paket::find($id);
        $paket->delete();
        return redirect()->route('paket.index')->with('pesan','Data Paket Berhasil di Hapus');
    }
    public function list()
    {
        $detailpaket=DetailPaket::all();
        return view('paket.list',compact('detailpaket'));
    }
    public function excel()
    {
        return view('paket.excel');
    }
    public function upload(Request $request)
    {
        // return 'upload ok';
        $this->validate($request,[
            'file'=>'required||mimes:xls,xlsx'
        ]);
        if ($request->hasFile('file')) {
            $file=$request->file('file');
            Excel::import(new PaketImport,$file);
            return redirect()->route('paket.index')->with('pesan','File Berhasil di Upload');
        }
        return redirect()->back()->with('pesan','File Gagal di Upload');
    }
}