<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Category $caterory, City $city, Ad $ad)
    {
        return view('index', [
            'categories' => $caterory->orderBy('title', 'asc')->get(),
            'cities' => $city->orderBy('name', 'asc')->get(),
            'lastTenAds' => $ad->where('status_id', 1)->orderby('created_at', 'desc')->limit(10)->get(),
            'barter_types' => [
                ['barter', 'Обмен'],
                ['free', 'Даром']
            ],
        ]);
    }
}
