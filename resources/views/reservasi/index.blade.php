@extends('adminlte::page')
@section('title', 'List Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">List Reservasi</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('reservasi.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>


                            <th>No</th>
                            <th>Company Name</th>
                            <th>Phone</th>
                            <th>Tanggal Reservasi</th>
                            <th>Project Name</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservasi as $key => $reservasi)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$reservasi->Company_Name}}</td>
                            <td>{{$reservasi->Phone}}</td>
                            <td>{{$reservasi->Tanggal}}</td>
                            <td>{{$reservasi->Name_Project}}</td>
                            <td>{{$reservasi->Status}}
                                @switch($reservasi->Status)
                                @case('pesan')
                                Pesan
                                @break
                                @case('dibayar')
                                Dibayar
                                @break
                                @case('selesai')
                                Selesai
                                @endswitch</td>
                            <td>
                                <a href="{{route('reservasi.edit', $reservasi)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('reservasi.destroy', $reservasi)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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