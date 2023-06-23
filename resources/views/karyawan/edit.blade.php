@extends('adminlte::page')
@section('title', 'Edit Karyawan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Karyawan</h1>
@stop
@section('content')
<form action="{{route('karyawan.update', $karyawan)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Nama">Nama Karyawan</label>
                        <input type="text" class="form-control
                        @error('Nama') is-invalid @enderror" id="Nama" placeholder="Nama Karyawan" name="Nama" value="{{$karyawan->Nama ?? old('Nama')}}">
                        @error('Nama') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control
                        @error('Phone') is-invalid @enderror" id="Phone" placeholder="Phone" name="Phone" value="{{$karyawan->Phone ?? old('Phone')}}">
                        @error('Phone') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJabatan">Jabatan</label>
                        <select class="form-control @error('Jabatan') isinvalid @enderror" id="exampleInputJabatan" name="Jabatan">
                            <option value="admin" @if($karyawan->Jabatan ==
                                'administrasi' || old('Jabatan') == 'admin')selected
                                @endif>Adminr</option>
                            <option value="project_manager" @if($karyawan->Jabatan ==
                                'project_manager' || old('Jabatan') == 'project_manager')selected
                                @endif>project manager</option>
                        </select>
                        @error('Jabatan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('karyawan.index')}}" class="btn btn-danger">
                Batal
            </a>
        </div>
    </div>
    </div>
    </div>
    @stop