<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    protected $table ="bimbingan";

    protected $fillable =['deskripsi', 'document', 'user_id', 'nama', 'npm'];

}
