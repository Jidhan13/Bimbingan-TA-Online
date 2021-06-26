<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Admin;
use App\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $adm = Admin::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $adm = Admin::all();
        }
        return view('/admin.index', ['adm' => $adm]);
    }

    public function create(Request $request)
    {
        //insert ke table users
        $user = new User;
        $user->role = 'admin';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('secret');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke table admin
        $request->request->add(['user_id' => $user->id]);
        $adm = Admin::create($request->all());
        return redirect('/admin')->with('sukses', 'Data Berhasil Diinput');
    }

    public function edit($id)
    {
        $adm = Admin::find($id);
        return view('/admin.edit', ['adm' => $adm]);
    }

    public function update(Request $request, $id)
    {
        $adm = User::find($id);
        $adm->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $adm->avatar = $request->file('avatar')->getClientOriginalName();
            $adm->save();
        }
        return redirect('/admin')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $adm = Admin::find($id);
        $adm->delete($adm);
        return redirect('/admin')->with('sukses', 'Data Berhasil Dihapus');
    }

    public function AdminProfile($id)
    {
        $adm = Admin::find($id);
        return view('admin.profile', compact('adm'));
    }
}
