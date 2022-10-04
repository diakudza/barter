<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdStatus extends Model
{
    use HasFactory;

    public function getAllStatuses()
    {
        return $this->statusAll();
    }

    public function getAllPublicStatuses()
    {
        return $this->whereNotIn('id', [2, 3, 5])->get();
    }


    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
