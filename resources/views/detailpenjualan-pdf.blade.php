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

<h1 style="text-align: center;">Data Detail Penjualan</h1>

<table class="table table-hover table-bordered table-stripped" id="customers">
<tr>
th>No.</th>
                                <th>Nomor Nota</th>
                                <th>Jumlah Jual</th>
                                <th>Harga Jual</th>
                                <th>Sub Total</th>
                                <th>Nama Obat</th>
                            </tr>
  @php
  $no=1;
  @endphp   
  @foreach($data as $key => $bs)
  <tr>
                            <td>{{$no++}}</td>
                            <td>{{ $key + 1 }}</td>
                            <td id={{$key+1}}>{{ $bs->penjualan->nonota_jual}}</td>
                            <td>{{ $bs->jumlah_jual}}</td>
                            <td>{{ $bs->harga_jual}}</td>
                            <td>{{ $bs->sub_total_jual}}</td>
                            <td id={{$key+1}}>{{ $bs->obat->nama_obat}}</td>
</tr>
                            
                          
  @endforeach

  
</table>

</body>
</html>


