@extends('adminlte::page')
@section('title', 'Edit Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Edit Reservasi</h1>
@stop

@section('content')
<form action="{{route('reservasi.update', $reservasi)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Nama">No</label>
                        <div class="input-group">
                            <input type="hidden" name="Nama" id="Nama" value="{{old('Nama')}}">
                            <input type="text" class="form-control
                        @error('Nama') is-invalid @enderror" id="Nama" placeholder="No" name="Nama" value="{{$reservasi->Nama ?? old('Nama')}}">
                            @error('Nama') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Company_Name">Company Name</label>
                        <div class="input-group">
                            <input type="hidden" name="Company_Name" id="Company_Name" value="{{old('Company_Name')}}">
                            <input type="text" class="form-control
                        @error('Company_Name') is-invalid @enderror" id="Company_Name" placeholder="Company Name" name="Company_Name" value="{{$reservasi->Company_Name ?? old('Company_Name')}}">
                            @error('Company_Name') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Tanggal">Tanggal Reservasi</label>
                        <input type="date" class="form-control
                        @error('Tanggal') is-invalid @enderror" id="Tanggal" placeholder="Tanggal Reservasi" name="Tanggal" value="{{old('Tanggal')}}">
                        @error('Tanggal') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="number" class="form-control
                        @error('Phone') is-invalid @enderror" id="Phone" placeholder="Phone" name="Phone" value="{{old('Phone')}}">
                        @error('Phone') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Name_Project">Name Project</label>
                        <input type="text" class="form-control
                        @error('Name_Project') is-invalid @enderror" id="Name_Project" placeholder="Name Project" name="Name_Project" value="{{old('Name_Project')}}">
                        @error('Name_Project') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="Status">Status Reservasi</label>
                        <select class="form-select @error('Status') isinvalid @enderror" id="Status" name="Status">
                            <option value="pesan" @if(old('Status')=='pesan' )selected @endif>Pesan
                            </option>
                            <option value="dibayar" @if(old('Status')=='dibayar' )selected @endif>
                                Dibayar</option>
                            <option value="selesai" @if(old('Status')=='selesai' )selected @endif>
                                Selesai</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{route('reservasi.index')}}" class="btn btn-default">Batal</a>
    </div>

    @stop