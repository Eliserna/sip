<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Paket;
use App\DetailPaket;
class DetailPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailpaket=DetailPaket::all();
        return view('detailpaket.index',compact('detailpaket'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detailpaket.create');
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
            'tipe'=>'required',
            'content'=>'required',
        ]);
        DetailPaket::create($request->all());
        return redirect()->route('detailpaket.index')->with('pesan','Data Paket Berhasil di Tambahkan');
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
        $detailpaket=DetailPaket::findOrFail($id);
        return view('detailpaket.update',compact('detailpaket'));
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
            'tipe'=>'required',
            'content'=>'required',
        ]);
        $detailpaket=DetailPaket::find($id);
        $detailpaket->update($request->all());
        return redirect()->route('detailpaket.index')->with('pesan','Data Paket Berhasil di Update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailpaket=DetailPaket::find($id);
        $detailpaket->delete();
        return redirect()->route('detailpaket.index')->with('pesan','Data Paket Berhasil di Hapus');
    }
}