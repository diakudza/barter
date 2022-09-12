<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use App\Models\Region;
use App\Services\GeoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(Category $caterory, City $city, Ad $ad, Request $request, Region $region)
    {
        (new GeoService)->getFromCacheOrNewRequest($request);

        return view('index', [
            'categories' => $caterory->orderBy('title', 'asc')->get(),
            'cities' => $city->orderBy('name', 'asc')->get(),
            'lastTenAds' => $ad->whereNotIn('status_id', [2, 3, 5])->orderby('created_at', 'desc')->limit(10)->get(),
            'barter_types' => [
                ['barter', 'Обмен'],
                ['free', 'Даром']
            ],
        ]);
    }

}
