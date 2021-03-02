@extends('layouts.app')
@section('content')
<style type="text/css">
    .card-header {
       background-color:  #27c8f9;
     }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
        <div class="card-header"><i class="fas fa-database"> Pembayaran Paket</i></div>
                    <div class="card-body" style="background-color:   hsl(125, 66%, 72%);">
                        <h3><i class="fab fa-wpforms"> Form Transaksi Pembayaran</i></h3>
                        <a class="btn btn-success btn-sm" href="{{route('transaksi.upload')}}">
                            <i class="fas fa-file-upload"> Upload Bukti DP</i>
                        </a>
                        <a class="btn btn-success btn-sm" href="{{route('transaksi.pelunasan')}}">
                            <i class="fas fa-file-upload"> Upload Bukti Pelunasan</i>
                        </a>
                        <hr>
                        @include('validasi')
                    <table class="table table-bordered">
                        <tr class="success" style="background-color:  #27c8f9"><th colspan="10">Detail Transaksi</th></tr>
                        <tr>
                            <th><i class="far fa-sticky-note"> No</i></th>
                            <th><i class="fas fa-file-signature"> Customer</i></th>
                            <th><i class="fas fa-file-signature"> Paket</i></th>
                            <th><i class="fab fa-cuttlefish"> Qty</i></th>
                            <th><i class="fas fa-money-bill-alt"> Harga</i></th>
                            <th><i class="fas fa-money-bill-alt"> Total</i></th>
                            <th><i class="fas fa-money-bill-alt"> DP</i></th>
                            <th><i class="fas fa-money-bill-alt"> Sisa</i></th>
                            <th><i class="far fa-file-signature"> Bayar DP</i></th>
                            <th><i class="far fa-file-signature"> Pelunasan</i></th>
                        </tr>
                        <?php $no=1; $total=0; $dp=0; $sisa=0;?>
                         @foreach ($pemesanan as $item)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->paket->nama_paket }}</td>
                                <td>{{ $item->qty }}</td>
                                @php($harga=str_replace('.','',$item->paket->harga_paket))
                                <td>{{"Rp.".number_format($harga).",-" }}</td>
                                @php($total=str_replace('.','',$item->paket->harga_paket))
                                <td>{{"Rp.".number_format($total*$item->qty).",-" }}</td>
                                @php($dp=$total*(75/100))
                                <td>{{"Rp.".number_format($dp).",-"}}</td>
                                @php($sisa=$total-$dp)
                                <td>{{"Rp.".number_format($sisa).",-"}}</td>
                                @isset($item->pembayaran->img)
                                <td><img src="{{ asset('img/'.$item->pembayaran->img ?? '') }}" alt="" width="50px"></td>
                                <td><img src="{{ asset('img/'.$item->pembayaran->pelunasan ?? '') }}" alt="" width="50px"></td>
                                @endisset
                                <?php $no++ ?>
                            </tr>
                       @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection