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
                <div class="card-header"><i class="fas fa-edit"> Update Customer</i></div>
                    <div class="card-body">
                        @include('validasi')
                        {!! Form::model($customer,['route'=>['customer.update',$customer->id],'method'=>'PUT']) !!}
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-file-signature"> Nama</i></label>
                                <div class="col-md-6">
                                    {!! Form::select('id_user',\App\User::pluck('name','id'),NULL,['class'=>'form-control','autocomplete'=>'off']) !!}
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-file-signature"> Alamat</i></label>
                                <div class="col-md-6">
                                    {!! Form::text('alamat',null,['class'=>'form-control','autocomplete'=>'off']) !!}
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-file-signature"> Telp</i></label>
                                <div class="col-md-6">
                                    {!! Form::text('telp',null,['class'=>'form-control','autocomplete'=>'off']) !!}
                                </div>
                        </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-edit"> Update</i></button>
                                    <a href="{{ route('customer.index') }}" class="btn btn-info"><i class="fas fa-reply"> Back</i></a>
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