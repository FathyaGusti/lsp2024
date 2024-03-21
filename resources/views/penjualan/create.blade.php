@extends('adminlte::page')
@section('title', 'Pengisian Penjualan')
@section('content_header')
<h1 class="m-0 text-dark">Pengisian Data Penjualan</h1>
@stop
@section('content')
<form action="{{route('penjualan.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nonota_jual">Nomor Nota</label>
                        <input type="text" class="form-control @error('nonota_jual') is-invalid @enderror" id="nonota_jual" placeholder="Masukan Nomor Nota" name="nonota_jual"
                            value="{{old('nonota_jual')}}">
                        @error('nonota_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tgl_jual">Tanggal Jual</label>
                        <input type="datetime-local" class="form-control @error('tgl_jual') is-invalid @enderror" id="tgl_jual" placeholder="Masukan Tanggal Jual" name="tgl_jual"
                            value="{{old('tgl_jual')}}">
                        @error('tgl_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="total_jual">Total Jual </label>
                        <input type="text" class="form-control @error('total_jual') is-invalid @enderror" id="total_jual" placeholder="Masukan Total Jual" name="total_jual"
                            value="{{old('total_jual')}}">
                        @error('total_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control
@error('id_user') is-invalid @enderror" id="id_user" placeholder="Tanggal Pemesanan" name="id_user" value="{{ Auth::user()->id }}">
                        @error('id_user') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('penjualan.index')}}" class="btn
btn-default">
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
    //Fungsi pilih untuk memilih data bidang studi dan mengirimkan
    function pilih(id, user) {
        document.getElementById('id_user').value = id
        document.getElementById('users').value = user
    }
    </script>
    @endpush