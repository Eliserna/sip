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
                <div class="card-header"><i class="fas fa-plus-square"> Pembayaran Paket</i></a></div>
                    <div class="card-body">
                        @include('validasi')
                        {!! Form::open(['route'=>'transaksi.upload.pelunasan','method'=>'POST','enctype'=>'multipart/form-data']) !!}    
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <select name="id" class="form-control" required>
                                    @foreach ($pemesanan as $pesan)
                                    @if (isset($pesan->pembayaran))
                                    <option value="{{ $pesan->id }}">{{ $pesan->paket->nama_paket }}</option>
                                    @endif
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-file-signature"> Bukti Pelunasan</i></label>
                            <div class="col-md-6">
                                {!! Form::file('file',['class'=>'form-control']) !!}        
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-file-upload"> Upload</i></a></button>
                                <a class="btn btn-info btn-sm" href="{{route('transaksi.bayar')}}"><i class="fas fa-reply"> Back</i></a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection