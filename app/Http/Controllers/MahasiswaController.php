<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mahasiswa;
use App\User;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data_mhs = Mahasiswa::where('nama', 'LIKE', '%' . $request->search . '%')->orWhere('npm', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $data_mhs = Mahasiswa::all();
        }
        return view('/mahasiswa.index', ['data_mhs' => $data_mhs]);
    }

    public function create(Request $request)
    {
        //insert ke table users
        $user = new User;
        $user->role = 'mahasiswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('secret');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke table mahasiswa
        $request->request->add(['user_id' => $user->id]);
        $mhs = Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('sukses', 'Data Berhasil Diinput');
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        return view('/mahasiswa.edit',['mhs' => $mhs]);
    }

    public function update(Request $request, $id)
    {
        $mhs = User::find($id);
        $mhs->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $mhs->avatar = $request->file('avatar')->getClientOriginalName();
            $mhs->save();
        }
        return redirect('/mahasiswa')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $mhs = Mahasiswa::find($id);
        $mhs->delete($mhs);
        return redirect('/mahasiswa')->with('sukses', 'Data Berhasil Dihapus');
    }

}
