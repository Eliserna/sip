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
                <div class="card-header"><i class="fas fa-edit"> Update Detail Paket</i></div>
                    <div class="card-body">
                        @include('validasi')
                        {!! Form::model($detailpaket,['route'=>['detailpaket.update',$detailpaket->id],'method'=>'PUT']) !!}
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-file-signature"> Tipe</i></label>
                            <div class="col-md-6">
                                {!! Form::text('tipe',null,['class'=>'form-control','autocomplete'=>'off']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-money-bill-alt"> Content</i></label>
                            <div class="col-md-6">
                                {!! Form::text('content',null,['class'=>'form-control','autocomplete'=>'off']) !!}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-success"><i class="fas fa-edit"> Update</i></button>
                                <a href="{{ route('detailpaket.index') }}" class="btn btn-info"><i class="fas fa-reply"> Back</i></a>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection