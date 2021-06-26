@extends('layouts.master')

@section('title')
<title>Dosen</title>
@stop

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Dosen</h3>
                                    <div class="right">
                                        <form action="/dosen" method="GET">
                                            <input type="text" name="search" placeholder="Search">
                                            <input type="submit" class="btn btn-primary btn-sm" value="search">
                                        </form>

                                    </div>
                                    <div class="left">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">Dosen<i class="lnr lnr-plus-circle"></i></button>
                                    </div>
                                    @if(session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        {{session('sukses')}}
                                      </div>
                                    @endif
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAMA</th>
                                            <th>NIP</th>
                                            <th>JABATAN</th>
                                            <th>EMAIL</th>
                                            <th>OPSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dsn as $dosen)
                                        <tr>
                                            <td>{{$dosen->id}}</td>
                                            <td>{{$dosen->nama}}</td>
                                            <td>{{$dosen->nip}}</td>
                                            <td>{{$dosen->jabatan}}</td>
                                            <td>{{$dosen->email}}</td>
                                            <td>
                                                <a href="/dosen/{{$dosen->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/dosen/{{$dosen->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/dosen/create" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP</label>
                            <input name="nip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Jabatan</label>
                            <input name="jabatan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jabatan">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
            </div>
        </div>
@stop
