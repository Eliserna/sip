@extends('layouts.app')
@section('content')
<style type="text/css">
    .card-header {
       background-color:  #27c8f9;
     }
    .card-body {
       background-color:   hsl(125, 66%, 72%);
     }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
        <div class="card-header"><i class="fas fa-database"> Pemesanan Paket</i></div>
                    <div class="card-body">
                        @include('validasi')
                    <h3><i class="fab fa-wpforms"> Form Transaksi Pemesanan</i></h3>
                    <table class="table table-bordered" id="users-table">
                        {!! Form::open(['route'=>'transaksi.store','method'=>'POST']) !!}
                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        {!! Form::select('id_paket',\App\Paket::pluck('nama_paket','id'),NULL,['class'=>'form-control']) !!}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        {!! Form::number('qty',null,['class'=>'form-control']) !!}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="submit" class="btn btn-success">
                                        <i class="far fa-paper-plane"> Save</i>
                                    </button>
                                    <a href="{{route('transaksi.update')}}" class="btn btn-danger">
                                        <i class="far fa-check-circle"> Done</i>
                                    </a>
                                    <a href="{{route('transaksi.bayar')}}" class="btn btn-primary">
                                        <i class="far fa-check-circle"> Pay</i>
                                    </a>
                                </td>
                            </tr>
                    </table>
                    {!! Form::close() !!}
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
                            <th><i class="far fa-times-circle"> Cancel</i></th>
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
                                {!! Form::open(['route'=>['transaksi.destroy',$item->id],'method'=>'DELETE']) !!}
                                <td><button type="submit" class="btn btn-danger"><i class="far fa-times-circle"> Cancel</i></button></td>
                                {!! Form::close() !!}
                            </tr>
                            <?php $no++; ?>
                       @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable();
});
</script>
@endpush