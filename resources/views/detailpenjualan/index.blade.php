@extends('adminlte::page')
@section('title', 'Detail Penjualan')
@section('content_header')
    <h1 class="m-0 text-dark">Detail Penjualan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card overflow-scroll">
                <div class="card-body">
                @can('pemilik-only')
                <a href="/exportpdf2" class="btn btn-success mb-2">
                        Export Pdf
                    </a>
                    @endcan
                    @can('kasir-only')
                    <a href="{{ route('detailpembelian.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    @endcan
                    <table class="table table-hover table-bordered
table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Nota</th>
                                <th>Jumlah Jual</th>
                                <th>Harga Jual</th>
                                <th>Sub Total</th>
                                <th>Nama Obat</th>
                                @can('kasir-only')
                                <th>Opsi</th>
                                @endcan

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailpenjualan as $key => $bs)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td id={{$key+1}}>{{ $bs->penjualan->nonota_jual}}</td>
                                    <td>{{ $bs->jumlah_jual}}</td>
                                    <td>{{ $bs->harga_jual}}</td>
                                    <td>{{ $bs->sub_total_jual}}</td>
                                    <td id={{$key+1}}>{{ $bs->obat->nama_obat}}</td>
                                    @can('kasir-only')
                                    <td>
                                        <a href="{{ route('detailpembelian.edit', $bs) }}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{ route('detailpembelian.destroy', $bs) }}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Delete
                                        </a>
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el, dt) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
