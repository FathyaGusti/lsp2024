@extends('adminlte::page')
@section('title', 'Tambah Detail Pembelian')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Detail Pembelian</h1>
@stop
@section('content')
<form action="{{route('detailpembelian.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nonota_beli">Nomor Nota Beli</label>
                        <div class="input-group">
                        <input type="hidden" name="id_pembelian" id="id_pembelian" value="{{old('id_pembelian')}}">
                        <input type="text" class="form-control
                        @error('nonota_beli') is-invalid @enderror" placeholder="Nomor Nota Beli"
                        id="nonota_beli" name="nonota_beli" value="{{old('nonota_beli')}}" arialabel="Nomor Nota Beli" aria-describedby="cari" readonly>
                        <button class="btn btn-warning" type="button"
                        data-bs-toggle="modal" id="cari" data-bs-target="#modal1"></i>
                        Cari Data Nomor Nota Jual</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kadaluarsa">Tanggal Kadaluarsa</label>
                        <input type="datetime-local" class="form-control
@error('tgl_kadaluarsa') is-invalid @enderror" id="tgl_kadaluarsa" placeholder="Tanggal Kadaluarsa" name="tgl_kadaluarsa"
                            value="{{old('tgl_kadaluarsa')}}">
                        @error('tgl_kadaluarsa') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" class="form-control
@error('harga_beli') is-invalid @enderror" id="harga_beli" placeholder="Harga beli" name="harga_beli" 
                            value="{{old('harga_beli')}}" onkeyup="subtotal()">
                        @error('harga_beli') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_beli">Jumlah Beli</label>
                        <input type="number" class="form-control
@error('jumlah_beli') is-invalid @enderror" id="jumlah_beli" placeholder="Jumlah Beli" name="jumlah_beli" 
                            value="{{old('jumlah_beli')}}" onkeyup="subtotal()">
                        @error('jumlah_beli') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_total_beli">SubTotal Beli</label>
                        <input type="number" class="form-control
@error('sub_total_beli') is-invalid @enderror" id="sub_total_beli" placeholder="Total Beli" name="sub_total_beli"
                            value="{{old('sub_total_beli')}}">
                        @error('sub_total_beli') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="persen_margin_jual">Persen Margin Jual</label>
                        <input type="number" class="form-control
@error('persen_margin_jual') is-invalid @enderror" id="persen_margin_jual" placeholder="Total Beli" name="persen_margin_jual" 
                            value="{{old('persen_margin_jual')}}" onkeyup="subtotal()">
                        @error('persen_margin_jual') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="kode_obat">Kode Obat</label>
                        <div class="input-group">
                        <input type="hidden" name="id_obat" id="id_obat" value="{{old('id_obat')}}">
                        <input type="text" class="form-control
                        @error('kode_obat') is-invalid @enderror" placeholder="ID Distributor"
                        id="kode_obat" name="kode_obat" value="{{old('kode_obat')}}" arialabel="Kode Obat" aria-describedby="cari" readonly>
                        <button class="btn btn-warning" type="button"
                        data-bs-toggle="modal" id="cari" data-bs-target="#modal2"></i>
                        Cari Data Kode Obatr</button>
                        </div>
</div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('detailpembelian.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Distributor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <table class="table table-hover table-bordered
table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Merk Obat</th>
                                <th>Jenis Obat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obat as $key => $bs)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $bs->kode_obat }}</td>
                                    <td>{{ $bs->nama_obat }}</td>
                                    <td>{{ $bs->merk }}</td>
                                    <td>{{ $bs->jenis }}</td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="pilih1('{{$bs->id}}', '{{$bs->kode_obat}}')" data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <!-- Modal -->
    <div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Distributor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Nota Beli</th>
                            <th>Tanggal Beli</th>
                            <th>Total Beli</th>
                            <th>Id Distributor</th>
                            <th>Id User</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembelian as $key => $ds)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$ds->nonota_beli}}</td>
                            <td>{{$ds->tgl_beli}}</td>
                            <td>{{$ds->total_beli}}</td>
                            <td>{{$ds->fpemdis->nama_distributor}}</td>
                            <td>{{$ds->fpem->name}}</td>
                            <td>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="pilih2('{{$ds->id}}', '{{$ds->nonota_beli}}')" data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    @stop
    @push('js')
<script>
    function pilih1(id, dst) {
        document.getElementById('id_obat').value = id
        document.getElementById('kode_obat').value = dst
    }
    function pilih2(id, bstud) {
        document.getElementById('id_pembelian').value = id
        document.getElementById('nonota_beli').value = bstud
    }
</script>
<script>
            function subtotal(){
            var harga = document.getElementById('harga_beli').value;
            var jumlah = document.getElementById('jumlah_beli').value;
            var persen = document.getElementById('persen_margin_jual').value;
            
            diskon_decimal = persen/100;
            perhitungan_diskon = harga*diskon_decimal;
            // harga_dis = harga-perhitungan_diskon;
            total = harga * jumlah - perhitungan_diskon;
            document.getElementById('sub_total_beli').value= total;
            // document.getElementById('persen_margin_jual').value= perhitungan_diskon;
            
          }
        </script>
    @endpush
    
        
        
        