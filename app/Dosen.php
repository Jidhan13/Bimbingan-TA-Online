<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $fillable = ['nama', 'nip', 'email', 'jabatan', 'avatar', 'user_id'];
}


