<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #87CBB9;
  color: white;
}
</style>
</head>
<body>

<h1 style="text-align: center;">Data Detail Pembelian</h1>

<table class="table table-hover table-bordered table-stripped" id="customers">
<tr>
                        <th>No.</th>
                        <th>Id Pembelian</th>
                        <th>Tanggal Kadaluarsa</th>
                        <th>Harga Beli</th>
                        <th>Jumlah Beli</th>
                        <th>Sub Total beli</th>
                        <th>Persen Margin Jual</th>
                        <th>Kode Obat</th>
                            </tr>
  @php
  $no=1;
  @endphp   
  @foreach($data as $key => $bs)
  <tr>
                            <td>{{$no++}}</td>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $bs->fdpemb->nonota_beli }}</td>
                            <td>{{ $bs->tgl_kadaluarsa }}</td>
                            <td>{{ $bs->harga_beli }}</td>
                            <td>{{ $bs->jumlah_beli }}</td>
                            <td>{{ $bs->sub_total_beli }}</td>
                            <td>{{ $bs->persen_margin_jual }}</td>
                            <td>{{ $bs->fdpem->kode_obat }}</td>
</tr>
                            
                          
  @endforeach

  
</table>

</body>
</html>


