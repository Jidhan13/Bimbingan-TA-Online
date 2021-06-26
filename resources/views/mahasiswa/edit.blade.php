
@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Data Mahasiswa</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/mahasiswa/{{$mhs->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{$mhs->nama}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NPM</label>
                                        <input name="npm" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NPM" value="{{$mhs->npm}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kelas</label>
                                        <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas" value="{{$mhs->kelas}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fakultas</label>
                                        <input name="fakultas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fakultas" value="{{$mhs->fakultas}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Program Studi</label>
                                        <input name="program_studi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Program Studi" value="{{$mhs->program_studi}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$mhs->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Avatar</label>
                                        <input name="avatar" type="file" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                    @if(session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('sukses') }}
                                    </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
