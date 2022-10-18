<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use App\Services\GeoService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Category $caterory, City $city, Ad $ad, Request $request)
    {
        (new GeoService)->getFromCacheOrNewRequest($request);

        return view('index', [
            'categories' => $caterory->orderBy('title', 'asc')->get(),
            'cities' => $city->orderBy('name', 'asc')->get(),
            'lastTenAds' => $ad->where('status_id', 1)->orderby('created_at', 'desc')->limit(12)->get(),
            'barter_types' => [
                ['barter', 'Обмен'],
                ['free', 'Даром']
            ],
        ]);
    }

    public function payment()
    {
        return view('payment');
    }

}
