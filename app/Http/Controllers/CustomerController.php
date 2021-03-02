<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;
use App\User;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::all();
        return view('customer.index',compact('customer'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'alamat'=>'min:4|required',
            'telp'=>'min:4|required',
        ]);
        // $pemesanan = Pemesanan::where('id_user',auth()->user()->id);
        // $data = $request->except('submit');
        // $data['id_user'] = auth()->user()->id;
        // Pemesanan::create($data);
        // return redirect()->route('transaksi.index');
        $customer=Customer::where('id_user',auth()->user()->id);
        $data = $request->all();
        $data['id_user'] = auth()->user()->id;
        Customer::create($data);
        return redirect()->route('customer.index')->with('pesan','Data Customer Berhasil di Tambahkan');
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
        $customer=Customer::findOrFail($id);
        return view('customer.update',compact('customer'));
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
            'alamat'=>'min:4|required',
            'telp'=>'min:4|required',
        ]);
        $customer=Customer::find($id);
        $customer->update($request->all());
        return redirect()->route('customer.index')->with('pesan','Data Customer Berhasil di Update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('pesan','Data Customer Berhasil di Hapus');
    }
}