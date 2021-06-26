<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Message extends Model
{

    protected $fillable = [
        'user_id', 'to_user_id', 'content', 'read_at'
    ];

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = null;

   /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function messageToMessage()
    {
        return $this->hasMany(Message::class, 'message_id');
    }


    public function userFrom()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userTo()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

}
