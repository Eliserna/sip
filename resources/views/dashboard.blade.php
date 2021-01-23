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
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="card text-center">
                        @foreach ($silver as $item)
                        <h5 class="card-header bg-light"><b>{{ $item->nama_paket }}</b></h5>
                        <div class="card-body">
                          @php($harga=str_replace('.','',$item->harga_paket))
                          <h5 class="card-title pricing-card-title"><i class="fas fa-money-bill-alt"> {{ "Rp.".number_format ($harga).",-"}}</i></h5>
                          @php($perpanjangan=str_replace('.','',$item->perpanjangan))
                          <h5 class="card-title pricing-card-title"><i class="fas fa-money-bill-alt"> {{ "Rp.".number_format($perpanjangan).",-"." / tahun" }}</i></h5>
                          <ul class="list-unstyled mt-3 mb-4">
                            <li>Nama Domain <b>{{ $item->domain }}</b></li>
                            <li>Kapasitas Penyimpanan Data <b>{{ $item->penyimpanan }}</b></li>
                            <li>Bandwith <b>{{ $item->bandwith }}</b></li>
                            <li>Desain Web <b>{{ $item->desain }}</b></li>
                            <li>Fasilitas <b>{{ $item->fasilitas }}</b></li>
                            <li>Training <b>{{ $item->training }}</b></li>
                            <li>Akun Webmail <b>{{ $item->webmail }}</b></li>
                            <li>Maintenance <b>{{ $item->maintenance }}</b></li>
                            <li>Optimasi <b>{{ $item->optimasi}}</b></li>
                          </ul>
                          <a href="{{ route('transaksi.index') }}" class="btn btn-outline-success"><i class="far fa-paper-plane"> Order</i></a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card text-center">
                        @foreach ($gold as $item)
                        <h5 class="card-header bg-warning"><b>{{ $item->nama_paket }}</b></h5>
                        <div class="card-body">
                          @php($harga=str_replace('.','',$item->harga_paket))
                          <h5 class="card-title pricing-card-title"><i class="fas fa-money-bill-alt"> {{ "Rp.".number_format ($harga).",-"}}</i></h5>
                          @php($perpanjangan=str_replace('.','',$item->perpanjangan))
                          <h5 class="card-title pricing-card-title"><i class="fas fa-money-bill-alt"> {{ "Rp.".number_format($perpanjangan).",-"." / tahun" }}</i></h5>
                          <ul class="list-unstyled mt-3 mb-4">
                            <li>Nama Domain <b>{{ $item->domain }}</b></li>
                            <li>Kapasitas Penyimpanan Data <b>{{ $item->penyimpanan }}</b></li>
                            <li>Bandwith <b>{{ $item->bandwith }}</b></li>
                            <li>Desain Web <b>{{ $item->desain }}</b></li>
                            <li>Fasilitas <b>{{ $item->fasilitas }}</b></li>
                            <li>Training <b>{{ $item->training }}</b></li>
                            <li>Akun Webmail <b>{{ $item->webmail }}</b></li>
                            <li>Maintenance <b>{{ $item->maintenance }}</b></li>
                            <li>Optimasi <b>{{ $item->optimasi}}</b></li>
                          </ul>
                          <a href="{{ route('transaksi.index') }}" class="btn btn-outline-success"><i class="far fa-paper-plane"> Order</i></a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card text-center">
                        @foreach ($platinum as $item)
                        <h5 class="card-header bg-light"><b>{{ $item->nama_paket }}</b></h5>
                        <div class="card-body">
                          @php($harga=str_replace('.','',$item->harga_paket))
                          <h5 class="card-title pricing-card-title"><i class="fas fa-money-bill-alt"> {{ "Rp.".number_format ($harga).",-"}}</i></h5>
                          @php($perpanjangan=str_replace('.','',$item->perpanjangan))
                          <h5 class="card-title pricing-card-title"><i class="fas fa-money-bill-alt"> {{ "Rp.".number_format($perpanjangan).",-"." / tahun" }}</i></h5>
                          <ul class="list-unstyled mt-3 mb-4">
                            <li>Nama Domain <b>{{ $item->domain }}</b></li>
                            <li>Kapasitas Penyimpanan Data <b>{{ $item->penyimpanan }}</b></li>
                            <li>Bandwith <b>{{ $item->bandwith }}</b></li>
                            <li>Desain Web <b>{{ $item->desain }}</b></li>
                            <li>Fasilitas <b>{{ $item->fasilitas }}</b></li>
                            <li>Training <b>{{ $item->training }}</b></li>
                            <li>Akun Webmail <b>{{ $item->webmail }}</b></li>
                            <li>Akses <b>{{ $item->akses }}</b></li>
                            <li>Maintenance <b>{{ $item->maintenance }}</b></li>
                            <li> Optimasi <b>{{ $item->optimasi}}</b></li>
                          </ul>
                          <a href="{{ route('transaksi.index') }}" class="btn btn-outline-success"><i class="far fa-paper-plane"> Order</i></a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection