@extends('adminlte::page')
@section('title', 'Edit Pembelian')
@section('content_header')
<h1 class="m-0 text-dark">Edit Pembelian</h1>
@stop
@section('content')
<form action="{{route('pembelian.update', $pembelian)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="nonota_beli">Nomor Nota Beli</label>
                        <input type="number" class="form-control
@error('nonota_beli') is-invalid @enderror" id="nonota_beli" placeholder="Nomor Nota" name="nonota_beli"
                            value="{{$pembelian->nonota_beli ?? old('nonota_beli')}}">
                        @error('nonota_beli') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_beli">Tanggal Beli</label>
                        <input type="datetime-local" class="form-control
@error('tgl_beli') is-invalid @enderror" id="tgl_beli" placeholder="Tanggal beli" name="tgl_beli"
                            value="{{$pembelian->tgl_beli ?? old('tgl_beli')}}">
                        @error('tgl_beli') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_beli">Total Beli</label>
                        <input type="number" class="form-control
@error('total_beli') is-invalid @enderror" id="total_beli" placeholder="Total Beli" name="total_beli"
                            value="{{$pembelian->total_beli ?? old('total_beli')}}">
                        @error('total_beli') <span class="text-
danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_distributor">Id Distributor</label>
                        <div class="input-group">
                        <input type="hidden" name="id_distributor" id="id_distributor" value="{{$pembelian->fpemdis->id ?? old('id_distributor')}}">
                        <input type="text" class="form-control
                        @error('nama_distributor') is-invalid @enderror" placeholder="ID Distributor"
                        id="nama_distributor" name="nama_distributor" value="{{$pembelian->fpemdis->nama_distributor ?? old('nama_distributor')}}" arialabel="Nama distributor" aria-describedby="cari" readonly>
                        <button class="btn btn-warning" type="button"
                        data-bs-toggle="modal" id="cari" data-bs-target="#modal2"></i>
                        Cari Data Nama Distributor</button>
                        </div>
                    </div>
                        <div class="form-group">
                        <label for="name">Nama User</label>
                        <div class="input-group">
                        <input type="hidden" name="id_user" id="id_user" value="{{$pembelian->fpem->id ?? old('id_user')}}">
                        <input type="text" class="form-control
                        @error('name') is-invalid @enderror" placeholder="Nama User"
                        id="name" name="name" value="{{$pembelian->fpem->name ?? old('name')}}" arialabel="Nama User" aria-describedby="cari" readonly>
                        <button class="btn btn-warning" type="button"
                        data-bs-toggle="modal" id="cari" data-bs-target="#modal1"></i>
                        Cari Data Nama User</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('pembelian.index')}}" class="btn btn-
default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
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
                            <th>Nama Distributor</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($distributor as $key => $ds)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$ds->nama_distributor}}</td>
                            <td>{{$ds->alamat}}</td>
                            <td>{{$ds->notelepon}}</td>
                            <td>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="pilih2('{{$ds->id}}', '{{$ds->alamat}}')" data-bs-dismiss="modal">
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
    @push('js')
<script>
    function pilih2(id, dst) {
        document.getElementById('id_distributor').value = id
        document.getElementById('nama_distributor').value = dst
    }
</script>
    @endpush
    