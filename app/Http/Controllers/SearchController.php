<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ads\SearchAdRequest;
use App\Models\Ad;
use App\Models\AdStatus;
use App\Models\Category;
use App\Models\City;
use App\Queries\QueryBuilderAds;
use App\Services\GeoService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request, Category $caterory, City $city, AdStatus $status, Ad $ad)
    {
        $cityByIp = (new GeoService)->getFromCacheOrNewRequest($request);
        return view('search', [
            'categories' => $caterory->orderBy('title', 'asc')->get(),
            'cities' => $city->orderBy('name', 'asc')->get(),
            'statuses' => $status->getAllPublicStatuses(),
            'barter_types' => [['barter' , 'Обмен'], ['free', 'Даром']],
            'barter_type_selected' => $request->input('barter_type') ?? NULL,
            'adsByUserCity' => $ad->getLastAdsByCity($cityByIp)
        ]);
    }

    public function search(SearchAdRequest $request, Ad $ad, Category $caterory,
                           City $city, QueryBuilderAds $adsList, )
    {
        $validated = $request->validated();
        $ads = $adsList->getAdsBySearchParametrs($ad, $validated, $validated['resultCount'] ?? null);
        return view('search', [
            'searchResult' => $ads,
            'categories' => $caterory->orderBy('title', 'asc')->get(),
            'cities' => $city->orderBy('name', 'asc')->get(),
            'barter_types' => [
                ['barter', 'Обмен'],
                ['free', 'Даром']
            ],
            //selected_input
            'searchWord' => $request->input('name') ?? NULL,
            'categorise_selected' => $request->input('category') ?? NULL,
            'city_selected' => $request->input('city') ?? NULL,
            'archived_checked' => $request->input('status') ?? NULL,
            'barter_type_selected' => $request->input('barter_type') ?? NULL,
            'barter_for' => $request->input('barter_for') ?? NULL,
        ]);
    }
}
