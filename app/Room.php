<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'user_id', 'to_user_id'
    ];

    public $timestamps = false;

    public function messages()
    {
        return $this->belongsTo(Message::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'to_user_id');
    }
}
