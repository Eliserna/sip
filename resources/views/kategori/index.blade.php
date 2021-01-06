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
                <div class="card-header"><i class="fas fa-database"> Data Kategori</i></div>
                <div class="card-body">
                    <a class="btn btn-success btn-sm" href="{{route('kategori.create')}}">
                        <i class="fas fa-plus-square"> Tambah Kategori</i>
                    </a>
                    <a class="btn btn-success btn-sm" href="{{route('kategori.excel')}}">
                        <i class="fas fa-plus-square"> Import File Excel</i>
                    </a>
                    <hr>
                    @include('notifikasi')
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th><i class="far fa-sticky-note"> No</i></th>
                                <th><i class="fas fa-file-signature"> Nama Kategori</i></th>
                                <th><i class="fas fa-edit"> Update</i></th>
                                <th><i class="fas fa-trash-alt"> Delete</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($kategori as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{$item->nama_kategori}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('kategori.edit',$item->id)}}">
                                        <i class="fas fa-edit"> Update</i>
                                    </a>
                                </td>
                                {!! Form::open(['route'=>['kategori.destroy',$item->id],'method'=>'DELETE']) !!}    
                                <td>
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"> Delete</i>
                                    </button>
                                </td>
                                {!! Form::close() !!}
                            </tr>
                            <?php $no++; ?>
                            @endforeach
                        </tbody>
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