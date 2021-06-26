
@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Data Dosen</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/dosen/{{$dsn->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{$dsn->nama}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NIP</label>
                                        <input name="nip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP" value="{{$dsn->nip}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jabatan</label>
                                        <input name="jabatan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jabatan" value="{{$dsn->jabatan}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$dsn->email}}">
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
