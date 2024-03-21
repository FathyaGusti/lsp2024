@extends('adminlte::page')
@section('title', 'Edit Detail Penjualan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Detail Penjualan</h1>
@stop
@section('content')
<form action="{{route('detailpenjualan.update', $detailpenjualan)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="jumlah_jual">Jumlah Penjualan</label>
                        <input type="number" class="form-control @error('jumlah_jual') is-invalid @enderror"
                            id="jumlah_jual" placeholder="Jumlah Penjualan" name="jumlah_jual"
                            value="{{$detailpenjualan->jumlah_jual ?? old('jumlah_jual')}}" onchange = "subto()">
                        @error('jumlah_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" class="form-control @error('harga_jual') is-invalid @enderror"
                            id="harga_jual" placeholder="Harga Jual" name="harga_jual"
                            value="{{$detailpenjualan->harga_jual ?? old('harga_jual')}}" onchange = "subto()">
                        @error('harga_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="sub_total_jual">Subtotal</label>
                        <input type="number" class="form-control @error('sub_total_jual') is-invalid @enderror"
                            id="sub_total_jual" placeholder="Subtotal" name="sub_total_jual"
                            value="{{$detailpenjualan->sub_total_jual ?? old('sub_total_jual')}}">
                        @error('sub_total_jual') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <!-- Bottom Command -->

                    <div class="form-group">
                        <label for="id_penjualan">Nomor Nota</label>
                        <div class="input-group">
                            <input type="hidden" name="id_penjualan" id="id_penjualan" value="{{old('id_penjualan')}}">
                            <input type="text" class="form-control @error('penjualan') is-invalid @enderror"
                                placeholder="Nomor Nota" id="penjualan" name="penjualan" value="{{old('penjualan')}}"
                                arialabel="penjualan" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>Cari Nomor Nota</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_obat">Nama Obat</label>
                        <div class="input-group">
                            <input type="hidden" name="id_obat" id="id_obat" value="{{old('id_obat')}}">
                            <input type="text" class="form-control @error('obat') is-invalid @enderror"
                                placeholder="Nama Obat" id="obat" name="obat" value="{{old('obat')}}" arialabel="obat"
                                aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>Cari Nama Obat</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('detailpenjualan.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Nomor Nota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered tablestripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Nota</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penjualan as $key => $a)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$a->nonota_jual}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary
btn-xs" onclick="pilih('{{$a->id}}', '{{$a->nonota_jual}}')" data-bs-dismiss="modal">
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
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Nama Obat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered tablestripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Obat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($obat as $key => $a)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$a->nama_obat}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary
btn-xs" onclick="pilih1('{{$a->id}}', '{{$a->nama_obat}}')" data-bs-dismiss="modal">
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


    function pilih(id, penjualan) {
        document.getElementById('id_penjualan').value = id
        document.getElementById('penjualan').value = penjualan
    };

    function pilih1(id, obat) {
        document.getElementById('id_obat').value = id
        document.getElementById('obat').value = obat
    }
    </script>
    <script>
            function subto(){
            var harga = document.getElementById('harga_jual').value;
            var jumlah = document.getElementById('jumlah_jual').value;
            
            total = harga * jumlah;
            document.getElementById('sub_total_jual').value= total;
          }
        </script>
    @endpush