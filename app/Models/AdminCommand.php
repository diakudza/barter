<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCommand extends Model
{
    use HasFactory;

    protected $table = 'admin_log';

    protected $fillable = [
        'command', 'user_id', 'output', 'status'
    ];

    public function getLastCommands()
    {
        return $this->with('user')->limit(10)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
