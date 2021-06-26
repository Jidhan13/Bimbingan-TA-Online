<?php

namespace App\Http\Controllers;

use App\Bimbingan;
use App\Dosen;
use App\User;
use App\Mahasiswa;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use League\CommonMark\Block\Element\Document;
use App\Http\Controllers;

class BimbinganController extends Controller
{
    public function index()
    {
        return view('bimbingan.mahasiswa');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'npm' => 'required'
        ]);

        $mhs = new Bimbingan;
        $mhs->nama = $request->nama;
        $mhs->npm = $request->npm;
        $mhs->deskripsi = $request->deskripsi;
        $mhs->progres = $request->progres;
        $mhs->deskripsi = $request->deskripsi;
        $mhs->document = $request->document;
        $mhs->user_id = auth()->user()->id;
        if($request->hasFile('document')){
            $request->file('document')->move('storage/', $request->file('document')->getClientOriginalName());
            $mhs->document = $request->file('document')->getClientOriginalName();
            $mhs->save();
        }

        return redirect('/bimbingan', ['mhs' => $mhs])->with('sukses', 'Data Berhasil Diupload');
    }

    public function dosen(Request $request)
    {
        if ($request->has('search')) {
            $dsn = Bimbingan::where('nama', 'LIKE', '%' . $request->search . '%')->orWhere('npm', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $dsn = Bimbingan::all();
        }
        return view('bimbingan.dosen', ['dsn' => $dsn]);
    }

    public function delete($id)
    {
        $dsn = Bimbingan::find($id);
        $dsn->delete($dsn);
        return redirect('/bimbingan/dosen')->with('sukses', 'Data Berhasil Dihapus');
    }

}
