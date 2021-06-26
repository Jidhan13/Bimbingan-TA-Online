
@extends('layouts.master')

@section('title')
<title>Mahasiswa</title>
@stop

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data File Dan Progres Bimbingan</h3>
                                <br>
                                <div class="right">
                                    <form action="/bimbingan/dosen" method="GET">
                                        <input type="text" name="search" placeholder="Search">
                                        <input type="submit" class="btn btn-primary btn-sm" value="search">
                                    </form>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAMA</th>
                                            <th>NPM</th>
                                            <th>DESKRIPSI</th>
                                            <th>PROGRES</th>
                                            <th>Tanggal</th>
                                            <th>DOCUMENT</th>
                                            <th>OPSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dsn as $dosen)
                                        <tr>
                                            <td>{{$dosen->id}}</td>
                                            <td>{{$dosen->nama}}</td>
                                            <td>{{$dosen->npm}}</td>
                                            <td>{{$dosen->deskripsi}}</td>
                                            <td>{{$dosen->progres}}</td>
                                            <td>{{$dosen->created_at}}</td>
                                            <td><a href="{{ url('storage/'.$dosen->document) }}">{{$dosen->document}}</a></td>
                                            <td>
                                                <a href="/bimbingan/{{$dosen->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Delete</a>
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
@stop
