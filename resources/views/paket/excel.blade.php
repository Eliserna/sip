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
                <div class="card-header"><i class="fas fa-plus-square"> Paket Excel</i></a></div>
                    <div class="card-body">
                        @include('validasi')
                        {!! Form::open(['route'=>'paket.upload.excel','method'=>'POST','enctype'=>'multipart/form-data']) !!}    
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-file-signature"> Upload Paket</i></label>
                            <div class="col-md-6">
                                {!! Form::file('file',['class'=>'form-control']) !!}        
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-file-upload"> Upload</i></a></button>
                                <a class="btn btn-info btn-sm" href="{{route('paket.index')}}"><i class="fas fa-reply"> Back</i></a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection