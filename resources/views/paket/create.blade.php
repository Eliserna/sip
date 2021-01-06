@extends('layouts.app')
@section('content')
<div class="container">
    <style type="text/css">
        .card-header {
            background-color:  #27c8f9;
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="fas fa-plus-square"> Tambah Paket</i></div>
                    <div class="card-body">
                        @include('validasi')
                        {!! Form::open(['route'=>'paket.store','method'=>'POST']) !!}
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-file-signature"> Nama Paket</i></label>
                            <div class="col-md-6">
                                {!! Form::text('nama_paket',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-money-bill-alt"> Harga Paket</i></label>
                            <div class="col-md-6">
                                {!! Form::text('harga_paket',null,['class'=>'form-control uang']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-puzzle-piece"> Perpanjangan</i></label>
                            <div class="col-md-6">
                                {!! Form::text('perpanjangan',null,['class'=>'form-control uang']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fab fa-cuttlefish"> Jumlah Paket</i></label>
                            <div class="col-md-6">
                                {!! Form::number('jumlah_paket',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-cubes"> Nama kategori</i></label>
                            <div class="col-md-6">
                                {!! Form::select('id_kategori',\App\Kategori::pluck('nama_kategori','id'),NULL,['class'=>'form-control']) !!}
                            </div>
                        </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-plus-square"> Tambah</i></button>
                                    <a href="{{ route('paket.index') }}" class="btn btn-info"><i class="fas fa-reply"> Kembali</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
     $(document).ready(function(){
        $('.uang').mask('000.000.000', {reverse:true});
     });
</script>
@endsection