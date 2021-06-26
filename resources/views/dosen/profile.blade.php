@extends('layouts.master')

@section('title')
<title>Profile</title>
@stop

@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{auth()->user()->photo}}" width="130" height="130" class="img-circle" alt="Avatar">
                                <h3 class="name">{{auth()->user()->name}}</h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-6 stat-item">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Informasi Umum</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAMA</th>
                                            <th>NIP</th>
                                            <th>JABATAN</th>
                                            <th>EMAIL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$dsn->id}}</td>
                                            <td>{{$dsn->nama}}</td>
                                            <td>{{$dsn->nip}}</td>
                                            <td>{{$dsn->jabatan}}</td>
                                            <td>{{$dsn->email}}</td>
                                            {{-- @dd($dsn->id) --}}
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center"><a href="/dosen/{{$dsn->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
@stop
