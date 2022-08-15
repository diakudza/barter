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

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function City()
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
        return $this->images()->where('image_type','=',0);
    }

}
