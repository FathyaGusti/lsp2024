@extends('adminlte::page')
@section('title', 'Edit Obat')
@section('content_header')
<h1 class="m-0 text-dark">Edit Obat</h1>
@stop
@section('content')
<form action="{{route('obat.update', $obat)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="kode_obat">Kode Obat</label>
                        <input type="text" class="form-control @error('kode_obat') is-invalid @enderror" id="kode_obat"
                            placeholder="Kode Obat Baru" name="kode_obat"
                            value="{{$obat->kode_obat ?? old('kode_obat')}}">
                        @error('kode_obat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat"
                            placeholder="Nama Obat Baru" name="nama_obat"
                            value="{{$obat->nama_obat ?? old('nama_obat')}}">
                        @error('nama_obat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="merk">Merk Obat</label>
                        <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk"
                            placeholder="Merk Obat Baru" name="merk" value="{{$obat->merk ?? old('merk')}}">
                        @error('merk') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="jenis">Jenis Obat</label>
                        <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                            placeholder="Jenis Obat Baru" name="jenis" value="{{$obat->jenis ?? old('jenis')}}">
                        @error('jenis') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="satuan">Satuan Obat</label>
                        <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan"
                            placeholder="Satuan Obat Baru" name="satuan" value="{{$obat->satuan ?? old('satuan')}}">
                        @error('satuan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="golongan">Golongan Obat</label>
                        <input type="text" class="form-control @error('golongan') is-invalid @enderror" id="golongan"
                            placeholder="Golongan Obat Baru" name="golongan" value="{{$obat->golongan ?? old('golongan')}}">
                        @error('golongan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="kemasan">Kemasan Obat</label>
                        <input type="text" class="form-control @error('kemasan') is-invalid @enderror" id="kemasan"
                            placeholder="Kemasan Obat Baru" name="kemasan" value="{{$obat->kemasan ?? old('kemasan')}}">
                        @error('kemasan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="harga_jual">Harga Jual Obat</label>
                        <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual"
                            placeholder="Harga Jual Obat Baru" name="harga_jual" value="{{$obat->harga_jual ?? old('harga_jual')}}">
                        @error('harga_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="stok">stok Obat</label>
                        <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok"
                            placeholder="stok Obat Baru" name="stok" value="{{$obat->stok ?? old('stok')}}">
                        @error('stok') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->
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