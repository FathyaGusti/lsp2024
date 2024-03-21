@extends('adminlte::page')
@section('title', 'Penambahan data obat')
@section('content_header')
<h1 class="m-0 text-dark">Tambah data Obat</h1>
@stop
@section('content')
<form action="{{route('obat.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode_obat">Kode Obat</label>
                        <input type="text" class="form-control @error('kode_obat') is-invalid @enderror" id="kode_obat" placeholder="Masukan Kode Obat" name="kode_obat"
                            value="{{old('kode_obat')}}">
                        @error('kode_obat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" placeholder="Masukan Nama Obat" name="nama_obat"
                            value="{{old('nama_obat')}}">
                        @error('nama_obat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" placeholder="Masukan Merk Obat" name="merk"
                            value="{{old('merk')}}">
                        @error('merk') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Masukan Jenis Obat" name="jenis"
                            value="{{old('jenis')}}">
                        @error('jenis') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="satuan">Satuan Obat</label>
                        <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" placeholder="Masukan Satuan Obat" name="satuan"
                            value="{{old('satuan')}}">
                        @error('satuan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="golongan">Golongan Obat</label>
                        <input type="text" class="form-control @error('golongan') is-invalid @enderror" id="golongan" placeholder="Masukan Golongan Obat" name="golongan"
                            value="{{old('golongan')}}">
                        @error('golongan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="kemasan">Kemasan Obat</label>
                        <input type="text" class="form-control @error('kemasan') is-invalid @enderror" id="kemasan" placeholder="Masukan Kemasan Obat" name="kemasan"
                            value="{{old('kemasan')}}">
                        @error('kemasan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_jual">Harga Jual Obat</label>
                        <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Masukan Harga Jual Obat" name="harga_jual"
                            value="{{old('harga_jual')}}">
                        @error('harga_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok Obat</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Masukan Stok Obat" name="stok"
                            value="{{old('stok')}}">
                        @error('stok') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('obat.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
    @push('js')
    <script>
    $('#example2').DataTable({
        "responsive": true,
    });
    </script>
    @endpush