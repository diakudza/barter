<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdUserFavorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ad_id'];

    protected $table = 'ad_user_favorites';
}
