<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Mahasiswa;
use App\Message;
use App\Dosen;
use App\Bimbingan;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'photo',
        'message',
    ];

    public function getPhotoAttribute()
    {
        if (!$this->avatar) {
            return asset('images/default.png');
        }

        return asset('images/' . $this->avatar);
    }

    public function getMessageAttribute()
    {
        return Message::where('user_id', $this->id)->orWhere('to_user_id', $this->id)->orderBy('created_at', 'desc')->first()->created_at;
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function messageForm()
    {
        return $this->belongsToMany(User::class, 'messages', 'to_user_id');
    }

    public function messageTo()
    {
        return $this->belongsToMany(User::class, 'messages', 'user_id');
    }
}
