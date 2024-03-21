@extends('adminlte::page')
@section('title', 'Edit Detailpembelian')
@section('content_header')
<h1 class="m-0 text-dark">Edit Detailpembelian</h1>
@stop
@section('content')
<form action="{{route('detailpembelian.update', $depem)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="nonota_beli">Nomor Nota Beli</label>
                        <div class="input-group">
                        <input type="hidden" name="id_pembelian" id="id_pembelian" value="{{$depem->fdpemb->id ?? old('id_pembelian')}}">
                        <input type="text" class="form-control
                        @error('nonota_beli') is-invalid @enderror" placeholder="Nomor Nota Beli"
                        id="nonota_beli" name="nonota_beli" value="{{$depem->fdpem->nonota_beli ?? old('nonota_beli')}}" arialabel="Nomor Nota Beli" aria-describedby="cari" readonly>
                        <button class="btn btn-warning" type="button"
                        data-bs-toggle="modal" id="cari" data-bs-target="#modal1"></i>
                        Cari Data Nomor Nota Jual</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kadaluarsa">Tanggal Kadaluarsa</label>
                        <input type="datetime-local" class="form-control
@error('tgl_kadaluarsa') is-invalid @enderror" id="tgl_kadaluarsa" placeholder="Tanggal Kadaluarsa" name="tgl_kadaluarsa"
                            value="{{$depem->tgl_kadaluarsa ?? old('tgl_kadaluarsa')}}">
                        @error('tgl_kadaluarsa') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" class="form-control
@error('harga_beli') is-invalid @enderror" id="harga_beli" placeholder="Harga beli" name="harga_beli"
                            value="{{$depem->harga_beli ?? old('harga_beli')}}">
                        @error('harga_beli') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_beli">Jumlah Beli</label>
                        <input type="number" class="form-control
@error('jumlah_beli') is-invalid @enderror" id="jumlah_beli" placeholder="Jumlah Beli" name="jumlah_beli"
                            value="{{$depem->jumlah_beli ?? old('jumlah_beli')}}">
                        @error('jumlah_beli') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_total_beli">Total Beli</label>
                        <input type="number" class="form-control
@error('sub_total_beli') is-invalid @enderror" id="sub_total_beli" placeholder="Total Beli" name="sub_total_beli"
                            value="{{$depem->sub_total_beli ?? old('sub_total_beli')}}">
                        @error('sub_total_beli') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="persen_margin_jual">Persen Margin Jual</label>
                        <input type="number" class="form-control
@error('persen_margin_jual') is-invalid @enderror" id="persen_margin_jual" placeholder="Total Beli" name="persen_margin_jual"
                            value="{{$depem->persen_margin_jual ?? old('persen_margin_jual')}}">
                        @error('persen_margin_jual') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="kode_obat">Kode Obat</label>
                        <div class="input-group">
                        <input type="hidden" name="id_obat" id="id_obat" value="{{$depem->fdpem->id ?? old('id_obat')}}">
                        <input type="text" class="form-control
                        @error('kode_obat') is-invalid @enderror" placeholder="ID Distributor"
                        id="kode_obat" name="kode_obat" value="{{$depem->fdpem->kode_obat ?? old('kode_obat')}}" arialabel="Kode Obat" aria-describedby="cari" readonly>
                        <button class="btn btn-warning" type="button"
                        data-bs-toggle="modal" id="cari" data-bs-target="#modal2"></i>
                        Cari Data Kode Obatr</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-
primary">Simpan</button>
                    <a href="{{route('detailpembelian.index')}}" class="btn btn-
default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop