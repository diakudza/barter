<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = ['role', 'access_type'];

    public function getUsers()
    {
        return $this->hasMany(User::class, 'role_id','id');
    }

    public function getUsersCount()
    {
        return $this->getUsers()->count();
    }

}
