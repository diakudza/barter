<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use App\Models\Region;
use App\Services\GeoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    public function getAllCitiesByRegion(Request $request, Region $region)
    {
        $region = $region->find($request->input('region_id'));
        return $region->cities()->select('id','name')->get();
    }

    public function setUserCity(Request $request, City $city)
    {
        session([
            'userCityId' => $request->input('city_id'),
            'userCity' => $city->find($request->input('city_id'))->name,
        ]);
        return true;
    }

    public function getRegions(Region $region, Request $request)
    {
        return ($region->select('id', 'name')->orderBy('name', 'asc')->get());
    }

}
