@extends('adminlte::page')
@section('title', 'List Pembelian')
@section('content_header')
<h1 class="m-0 text-dark">List Pembelian</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('pembelian.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
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
                                <a href="{{route('pembelian.edit',
$ds)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{ route('pembelian.destroy', $ds) }}"
                                    onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
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