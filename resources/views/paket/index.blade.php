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
               <div class="card-header"><i class="fas fa-database"> Data Paket</i></div>
                  <div class="card-body">
                 <a href="{{ route('paket.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus-square"> Add Paket</i>
                </a>
                <a class="btn btn-success btn-sm" href="{{ route('paket.excel') }}">
                    <i class="fas fa-file-upload"> Import File Excel</i>
                </a>
                   <hr>
                   @include('notifikasi')
                     <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th><i class="far fa-sticky-note"> No</i></th>
                                <th><i class="fas fa-file-signature"> Nama Paket</i></th>
                                <th><i class="fas fa-money-bill-alt"> Harga Paket</i></th>
                                <th><i class="fas fa-puzzle-piece"> Perpanjangan</i></th>
                                <th><i class="fas fa-edit"> Update</i></th>
                                <th><i class="fas fa-trash-alt"> Delete</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($paket as $item)
                              <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->nama_paket }}</td>
                                    @php($harga=str_replace('.','',$item->harga_paket))
                                    <td>{{ "Rp.".number_format ($harga).",-"}}</td>
                                    @php($perpanjangan=str_replace('.','',$item->perpanjangan))
                                    <td>{{ "Rp.".number_format($perpanjangan).",-"." / tahun" }}</td>
                                    <td>
                                        <a href="{{ route('paket.edit',$item->id) }}"  name="submit" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"> Update</i>
                                        </a>
                                    </td>
                                    {!! Form::open(['route'=>['paket.destroy',$item->id],'method'=>'Delete']) !!}
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
</div>
@endsection
@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable();
});
</script>
@endpush