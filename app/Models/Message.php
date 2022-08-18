<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'chat_id', 'text'];

    public function getUserName()
    {
        return $this->hasOne(User::class);
    }
}
