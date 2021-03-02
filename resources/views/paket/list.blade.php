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
                <div class="card-header"><i class="fas fa-database"> PAKET BIAYA DAN SPESIFIKASI</i></div>
                <div class="card-body" style="background-color:   hsl(125, 66%, 72%);">
                  <div class="row">
                    @foreach ($detailpaket as $item)
                    <div class="col-sm-4">
                      <div class="card text-center">
                        <h5 class="card-header" style="background-color:#27c8f9"><b>{{ $item->paket->nama_paket }}</b></h5>
                        <div class="card-body">
                          @php($harga=str_replace('.','',$item->paket->harga_paket))
                          <h5 class="card-title pricing-card-title"><i class="fas fa-money-bill-alt"> {{ "Rp.".number_format ($harga).",-"}}</i></h5>
                          @php($perpanjangan=str_replace('.','',$item->paket->perpanjangan))
                          <h5 class="card-title pricing-card-title"><i class="fas fa-money-bill-alt"> {{ "Rp.".number_format($perpanjangan).",-"." / tahun" }}</i></h5>
                          <ul class="list-unstyled mt-3 mb-4">
                            <li>{!! $item->content !!}</li>
                          </ul>
                          <a href="{{route('transaksi.store')}}" class="btn btn-outline-success"><i class="far fa-paper-plane"> Order</i></a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="card-footer">
                   <center>*untuk pemesanan info lebih lanjut <i class="far fa-envelope"></i>
                    inovindocorp@gmail.com  <i class="fab fa-whatsapp"></i> 085 6225 1196  www.inovindo.co.id</center> 
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection