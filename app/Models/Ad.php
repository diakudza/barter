<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'user_id', 'category_id', 'city_id',
        'barter_type', 'status_id'
    ];

    public function getCreatedDate()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo(AdStatus::class, 'status_id', 'id');
    }

    public function usersWished()
    {
        return $this->belongsToMany(User::class, 'ad_user');
    }

    public function favoriteUsers()
    {
        return $this->belongsToMany(User::class, 'ad_user_favorites');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function imageMain()
    {
        return $this->images()->where('image_type', 'ad_main');
    }

    public function getLastAdsByCity($city)
    {
        return $city ? $this->whereRelation('city', 'name', 'LIKE', $city . '%')->where('status_id', '=', 1)->orderBy('updated_at', 'DESC')->limit(10)->get() : null;
    }
}
