<table class="table table-bordered">
    <tr class="success"><th colspan="6">Laporan Pemesanan Paket</th></tr>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Customer</th>
        <th>Paket</th>
        <th>Total</th>
        <th>DP</th>
        <th>Sisa</th>
    </tr>
    <?php $no=1; $total=0; $dp=0; $sisa=0;?>
     @foreach ($pemesanan as $item)
        <tr>
            <td>{{$no}}</td>
            <td>{{$item->created_at->formatLocalized('%d %b %Y')}}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->paket->nama_paket }}</td>
            @php($total=str_replace('.','',$item->paket->harga_paket))
            <td>{{"Rp.".number_format($total*$item->qty).",-" }}</td>
            @php($dp=$total*(75/100))
            <td>{{"Rp.".number_format($dp).",-"}}</td>
            @php($sisa=$total-$dp)
            <td>{{"Rp.".number_format($sisa).",-"}}</td>
            <?php $no++ ?>
        </tr>
   @endforeach
</table>