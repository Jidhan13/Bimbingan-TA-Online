@extends('layouts.master')

@section('title')
<title>Bimbingan</title>
@stop

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Input Data Bimbingan</h3>
                        </div>
                        <div class="panel-body">
                        <form action="/bimbingan" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if(session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('sukses') }}
                                    </div>
                                    @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input name="nama" type="text" class="form-control" placeholder="Nama">
                                    @if ($errors->has('nama'))
                                    <small class="form-text text-danger">{{$errors->first('nama')}}</small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">NPM</label>
                                    <input name="npm" type="text" class="form-control" placeholder="NPM">
                                    @if ($errors->has('npm'))
                                    <small class="form-text text-danger">{{$errors->first('npm')}}</small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" placeholder="Deskripsi"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Progres</label>
                                    <input name="progres" type="text" class="form-control" placeholder="Progres">
                                    @if ($errors->has('progres'))
                                    <small class="form-text text-danger">{{$errors->first('progres')}}</small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Choose File</label>
                                    <input name="document" type="file" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Upload</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
