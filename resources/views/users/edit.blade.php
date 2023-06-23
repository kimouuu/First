@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
<h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
<form action="{{route('users.update', $user)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputname">Nama Lengkap</label>
                        <input type="text" class="form-control 
@error('name') is-invalid @enderror" id="exampleInputname" placeholder="Nama Lengkap" name="name" value="{{$user->name ??
old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputemail">Email Address</label>
                        <input type="text" class="form-control 
@error('email') is-invalid @enderror" id="exampleInputemail" placeholder="Email Address" name="email" value="{{$user->email ??
old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputpassword">Password</label>
                        <input type="text" class="form-control 
@error('password') is-invalid @enderror" id="exampleInputpassword" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputpassword">Konfirmasi Password</label>
                        <input type="text" class="form-control" id="exampleInputpassword" placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputjabatan">Jabatan</label>
                        <select class="form-control @error('jabatan') is-invalid @enderror" id="exampleInputjabatan" name="jabatan">
                            <option value="admin" @if($user->jabatan ==
                                'admin' || old('jabatan') == 'admin')selected @endif>Admin</option>
                            <option value="project manager" @if($user->jabatan
                                == 'project manager' || old('jabatan') == 'project manager')selected
                                @endif>Project Manager</option>
                        </select>
                        @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputaktif">aktif</label>
                        <select class="form-control @error('aktif') - @enderror" id="exampleInputaktif" name="aktif">
                            <option value="1" @if($user->aktif == '1'
                                || old('aktif') == '1')selected @endif>Ya</option>
                            <option value="0" @if($user->aktif == '0' ||
                                old('aktif') == '0')selected @endif>Tidak</option>
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