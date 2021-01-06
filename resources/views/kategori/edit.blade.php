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
                <div class="card-header"><i class="fas fa-edit"> Update Kategori</i></div>
                    <div class="card-body">
                        @include('validasi')
                        {!! Form::model($kategori,['route'=>['kategori.update',$kategori->id],'method'=>'PUT']) !!}    
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-file-signature"> Nama Kategori</i></label>
                            <div class="col-md-6">
                                {!! Form::text('nama_kategori',null,['class'=>'form-control']) !!}        
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-edit"> Update</i></button>
                                <a class="btn btn-info btn-sm" href="{{route('kategori.index')}}"><i class="fas fa-reply"> kembali</i></a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection