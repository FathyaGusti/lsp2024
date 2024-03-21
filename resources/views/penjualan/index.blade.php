@extends('adminlte::page')
@section('title', 'List Penjualan')
@section('content_header')
<h1 class="m-0 text-dark">List Penjualan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('penjualan.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Nota penjualan</th>
                            <th>Tanggal Jual</th>
                            <th>Total Jual</th>
                            <th>Nama Kasir</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penjualan as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$data->nonota_jual}}</td>
                            <td>{{$data->tgl_jual}}</td>
                            <td>{{$data->total_jual}}</td>
                            <td id={{$key+1}}>{{$data->users->name}}</td>
                            <td>
                                <a href="{{route('penjualan.edit', $data)}}" class="btn btn-primary btn-xs">
                                    Edit
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
<script>
$('#example2').DataTable({
    "responsive": true,
});
</script>
@endpush