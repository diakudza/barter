<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\Boolean;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function getRole()
    {
        return $this->hasOne(UserRole::class, 'id', 'role_id');
    }

    public function status()
    {
        return $this->hasOne(UserStatus::class, 'id', 'status_id');
    }

    public function getByRole($role_id)
    {
        return $this->where('role_id', $role_id)->get();
    }

    public function wishes()
    {
        return $this->belongsToMany(Ad::class);
    }

    public function favoriteAds()
    {
        return $this->belongsToMany(Ad::class, 'ad_user_favorites');
    }

    public function isBlockedUser()
    {
        return ($this->status->status == 'blocked') ? true : false;
    }

    public function isUserHasAdminAccess()
    {
        return (in_array($this->getRole->id, [2, 3, 4])) ? true : false;
    }

    public function getChats()
    {
        return $this->belongsToMany(Chat::class,'chat_users');
    }
    public function getChatsWithUser(int $user_id)
    {
        return DB::table('chat_users')->where('user_id', $user_id);
    }

    public function getUnreadMessages()
    {
        return $this->hasMany(Message::class, )->where('read','=',0);
    }
}
