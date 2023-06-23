@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
<h1 class="m-0 text-dark">Tambah User</h1>
@stop
@section('content')
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputname">Nama Lengkap</label>
                        <input type="text" class="form-control 
@error('name') is-invalid @enderror" id="exampleInputname" placeholder="Nama Lengkap" name="name" value="{{old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputemail">Email Address</label>
                        <input type="text" class="form-control 
@error('email') is-invalid @enderror" id="exampleInputemail" placeholder="Email Address" name="email" value="{{old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputpassword">Password</label>
                        <input type="password" class="form-control 
@error('password') is-invalid @enderror" id="exampleInputpassword" placeholder="Password" name="password" value="{{old('password')}}">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputpassword">Konfirmasi Password</label>
                        <input type="password" class="form-control 
@error('password') is-invalid @enderror" id="exampleInputpassword" placeholder="Konfirmasi Password" name="password" value="{{old('password')}}">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputjabatan">Jabatan</label>
                        <select class="form-control @error('jabatan') is-invalid @enderror" id="exampleInputjabatan" name="jabatan">
                            <option value="admin" @if(old('jabatan')=='admin' )selected @endif>Admin</option>
                            <option value="project manager" @if(old('jabatan')=='projectmanager' )selected @endif>Project Manage</option>
                        </select>
                        @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop