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
        $reg = $request->input('region');
        $region = $region->find($reg);
        return ($region->cities->pluck('id', 'name'));
    }
    public function setUserCity()
    {

    }

}
