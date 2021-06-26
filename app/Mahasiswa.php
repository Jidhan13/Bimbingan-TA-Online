<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama', 'npm', 'kelas', 'fakultas', 'program_studi', 'email', 'user_id'];

}
