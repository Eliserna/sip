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
               <div class="card-header"><i class="fas fa-database"> Detail Paket</i></div>
                 <div class="card-body">
                 <a href="{{ route('detailpaket.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus-square"> Add Detail Paket</i>
                 </a>
                 <hr>
                 @include('notifikasi')
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th><i class="far fa-sticky-note"> No</i></th>
                                <th><i class="fas fa-file-signature"> Tipe</i></th>
                                <th><i class="fas fa-money-bill-alt"> Content</i></th>
                                <th><i class="fas fa-edit"> Update</i></th>
                                <th><i class="fas fa-trash-alt"> Delete</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($detailpaket as $item)
                              <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->tipe }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>
                                        <a href="{{ route('detailpaket.edit',$item->id) }}"  name="submit" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"> Update</i>
                                        </a>
                                    </td>
                                    {!! Form::open(['route'=>['detailpaket.destroy',$item->id],'method'=>'Delete']) !!}
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