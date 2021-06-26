<?php

namespace App\Http\Controllers;
use App\User;
use App\Dosen;
use App\Mahasiswa;
use App\Admin;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function AdminProfile($id)
    {
        $adm = Admin::find($id);
        return view('admin.profile', compact('adm'));
    }

    public function MahasiswaProfile($id)
    {
        $mhs = Mahasiswa::find($id);
        return view('mahasiswa.profile', compact('mhs'));
    }
}
