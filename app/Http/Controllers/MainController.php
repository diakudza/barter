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
        if (session()->has('userCity')) {
            $userCity = session('userCity');
        } elseif (Auth::user()) {
            $userCity = (Auth::user()->city()->first()->name) ?? (new GeoService)->getCityByIp($request->ip());
            session(['userCity' => $userCity]);
        } else {
            $userCity = (new GeoService)->getCityByIp($request->ip());
            session(['userCity' => $userCity]);
        }

        if (!session()->has('showCityChoice') && !session('showCityChoice') && $userCity) {
          /*  dd(Auth::user());
            if (stripos(Auth::user()->city()->first()->name, 'Москва') === false) {
                session(['showCityChoice'=> true]);
            } else {
                session(['showCityChoice'=> false]);
            }*/
        }


        return view('index', [
            'categories' => $caterory->orderBy('title', 'asc')->get(),
            'cities' => $city->orderBy('name', 'asc')->get(),
            'regions' => $region->orderBy('name', 'asc')->get(),
            'userCity' => $userCity,
            'lastTenAds' => $ad->whereNotIn('status_id', [2, 3, 5])->orderby('created_at', 'desc')->limit(10)->get(),
            'barter_types' => [
                ['barter', 'Обмен'],
                ['free', 'Даром']
            ],
        ]);
    }

}
