@extends('adminlte::page')
@section('title', 'Data Detail Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">Data Detail Pembelian</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card overflow-scroll">
                <div class="card-body">
                    @can('pemilik-only')
                <a href="/exportpdf" class="btn btn-success mb-2">
                        Export Pdf
                    </a>
                    @endcan
                    @can('gudang-only')
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
                                <th>Tanggal Kadaluarsa</th>
                                <th>Harga Beli</th>
                                <th>Jumlah Beli</th>
                                <th>Sub Total beli</th>
                                <th>Persen Margin Jual</th>
                                <th>Kode Obat</th>
                                @can('gudang-only')
                                <th>Opsi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailpembelian as $key => $bs)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $bs->fdpemb->nonota_beli }}</td>
                                    <td>{{ $bs->tgl_kadaluarsa }}</td>
                                    <td>{{ $bs->harga_beli }}</td>
                                    <td>{{ $bs->jumlah_beli }}</td>
                                    <td>{{ $bs->sub_total_beli }}</td>
                                    <td>{{ $bs->persen_margin_jual }}</td>
                                    <td>{{ $bs->fdpem->kode_obat }}</td>
                                    @can('gudang-only')
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

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
