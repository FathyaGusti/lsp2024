@extends('adminlte::page')
@section('title', 'Edit Penjualan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Penjualan</h1>
@stop
@section('content')
<form action="{{route('penjualan.update', $penjualan)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="nonota_jual">Nomor Nota Penjualan</label>
                        <input type="text" class="form-control @error('nonota_jual') is-invalid @enderror" id="nonota_jual"
                            placeholder="Masukan Nomor Nota Penjualan" name="nonota_jual" value="{{$penjualan->nonota_jual ?? old('nonota_jual')}}">
                        @error('nonota_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="tgl_jual">Tanggal Penjualan</label>
                        <input type="datetime-local" class="form-control @error('tgl_jual') is-invalid @enderror" id="tgl_jual"
                            placeholder="Masukan Tanggal Penjualan" name="tgl_jual" value="{{$penjualan->tgl_jual ?? old('tgl_jual')}}">
                        @error('tgl_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="total_jual">Total Jual</label>
                        <input type="number" class="form-control @error('total_jual') is-invalid @enderror" id="total_jual"
                            placeholder="Masukan Total Jual" name="total_jual" value="{{$penjualan->total_jual ?? old('total_jual')}}">
                        @error('total_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                    <label for="id">Nama</label>
                    <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{old('id_user')}}">
                            <input type="text" class="form-control @error('users') is-invalid @enderror" placeholder="Nama" id="users" name="users" value="{{old('users')}}"
                                arialabel="Id User" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Nama</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('penjualan.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1"
        arialabelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Email</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <table class="table table-hover table-bordered tablestripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs"
                                        onclick="pilih('{{$user->id}}', '{{$user->name}}')" data-bs-dismiss="modal">
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
    $('#example2').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data bidang studi dan mengirimkan
    function pilih(id, user) {
        document.getElementById('id_user').value = id
        document.getElementById('users').value = user
    }
    </script>
    @endpush