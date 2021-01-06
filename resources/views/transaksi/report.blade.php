<table class="table table-bordered">
    <tr class="success"><th colspan="6">Laporan Penjualan Paket</th></tr>
    <tr>
        <th>No</th>
        <th>Nama Paket</th>
        <th>Qty</th>
        <th>Harga Paket</th>
        <th>Subtotal</th>
    </tr>
    <?php $no=1; $total=0; ?>
     @foreach ($transaksi as $item)
        <tr>
            <td>{{$no}}</td>
            <td>{{ $item->paket->nama_paket }}</td>
            <td>{{ $item->qty }}</td>
            @php($harga=str_replace('.','',$item->paket->harga_paket))
            <td>{{"Rp.".number_format($harga) }}</td>
            <td>{{"Rp.".number_format($harga*$item->qty) }}</td>
            <?php $no++ ?>
            <?php $total=$total+($harga*$item->qty) ?>
        </tr>
   @endforeach
        <tr>
            <td colspan="4"><p align="right">Total</p></td>
            <td>{{"Rp.".number_format($total)}}</td>
        </tr>
</table>