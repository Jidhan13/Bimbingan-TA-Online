<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Dosen;
use App\User;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $dsn = Dosen::where('nama', 'LIKE', '%'.$request->search.'%')->orWhere('nip', 'LIKE', '%'.$request->search.'%')->get();

        } else{
            $dsn = Dosen::all();
        }
        return view('/dosen.index', ['dsn' => $dsn]);
    }

    public function create(Request $request)
    {
        //insert ke table users
        $user = new User;
        $user->role = 'dosen';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('secret');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke table dosen
        $request->request->add(['user_id' => $user->id]);
        $dsn = Dosen::create($request->all());
        return redirect('/dosen')->with('sukses', 'Data Berhasil Diinput');
    }

    public function edit($id)
    {
        $dsn = Dosen::find($id);
        return view('/dosen.edit',['dsn' => $dsn]);
    }

    public function update(Request $request, $id)
    {
        $dsn = User::find($id);
        $dsn->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $dsn->avatar = $request->file('avatar')->getClientOriginalName();
            $dsn->save();
        }
        return redirect('/dosen')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $dsn = Dosen::find($id);
        $dsn->delete($dsn);
        return redirect('/dosen')->with('sukses', 'Data Berhasil Dihapus');
    }

    public function DosenProfile($id)
    {
        $dsn = Dosen::find($id);
        return view('dosen.profile', compact('dsn'));
    }

}
