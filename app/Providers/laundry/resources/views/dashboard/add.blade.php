<h1>HALO</h1>
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan.xls");
?>
<table border="1">
		<tr>
			<th>Total Transaksi</th>
      <th>Jumlah</th>

		</tr>
		<tr>
      <td>{{$detail}}</td>
      {{-- @foreach($detail as $details)
        <td>{{  $details->items->sum('total_bayar')  }}</td>
        @endforeach --}}
      <td>{{$tot}}</td>
		</tr>
</table>
