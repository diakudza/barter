<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdUser extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ad_id', 'read'];

    protected $table = 'ad_user';

    public function changeRead($ad)
    {
        foreach ($ad->usersWished()->get() as $user)
            $this->where('user_id', $user->id)->where('ad_id', $ad->id)->update(['read' => 1]);
    }
}
