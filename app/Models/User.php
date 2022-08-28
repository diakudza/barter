<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Database\Eloquent\Builder;

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
        'phone',
        'password',
        'role_id',
        'status_id',
        'rating',
        'voters_count'
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
        return $this->belongsToMany(Chat::class, 'chat_users');
    }

    public function getChatsWithUser(int $user_id)
    {
        return $this->belongsToMany(Chat::class, 'chat_users')
            ->whereRelation('users', 'user_id', '=', $user_id);
    }

    public function getUnreadMessages()
    {
            return DB::table('messages')
            ->where([
                ['read', '=', 0],
                ['user_id', '!=', auth()->user()->id ]
            ]);


    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function avatar()
    {
        return $this->images()->where('image_type', 'avatar');
    }

    public function getRegistrationDate()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getRating()
    {
        return $this->rating * 1;
    }

    /**
     * For navigation bar. Notify you when you add ads to your wishlist
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function yourAddedUnreadAds()
    {
        return $this->hasMany(AdUser::class,)->where('read', 0);
    }

    /**
     * For navigation bar. Notify when someone adds your ads to their wishlist
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function someoneAddedUnreadAds()
    {
        return $this->ads()->where('status_id', '!=', 4)
            ->withCount(['usersWished as adcount' => function (Builder $query) {
                $query->where('read', 0);
            }]);
    }

    /**
     * For navigation bar. Clear Notify when someone adds your ads to their wishlist
     */
    public function changeAdRead()
    {
        $ads = $this->ads()->where('status_id', '!=', 4)
            ->with('usersWished', function ($q) {
                return $q->where('read', 0);
            });

        foreach ($ads->get() as $ad) {
            (new AdUser())->changeRead($ad);
        }

    }
}
