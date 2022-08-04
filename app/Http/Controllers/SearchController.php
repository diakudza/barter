<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdStatus;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request, Category $caterory, City $city, AdStatus $status)
    {
        return view('search', [
            'categories' => $caterory->orderBy('title', 'asc')->get(),
            'cities' => $city->orderBy('name', 'asc')->get(),
            'statuses' => $status->getAllPublicStatuses(),
            'barter_types' => ['barter', 'free'],
            'barter_type_selected' => $request->input('barter_type') ?? NULL,
        ]);
    }

    public function search(Request $request, Ad $ad, Category $caterory, City $city, AdStatus $status)
    {
        $query = '';


        if ($request->input('name')) {
            $query .= (($query) ? " AND " : "") . "title like '%" . mb_strtolower($request->input('name')) . "%'";
            //search by word in title(only)
        }

        if ($request->input('category')) {
            $query .= (($query) ? " AND " : "") . "category_id = " . $request->input('category'); //add category search
        }

        if ($request->input('city')) {
            $query .= (($query) ? " AND " : "") . "city_id = " . $request->input('city'); //add city search
        }

        if ($request->input('barter_type')) {
            $query .= (($query) ? " AND " : "") . "barter_type = '" . $request->input('barter_type') . "'"; //add barter type search
        }

        if ($request->input('status')) {
            $query .= (($query) ? " AND " : "") . "status in (1, 4)"; //when checkbox checked - show active and archived
        } else {
            $query .= (($query) ? " AND " : "") . "status = 1 "; //active only
        }

        if ($query == '' || $query == "status = 1 ") {
            return redirect()->back()->with('alert', 'не выбран ни один параметр');
        }

        $ad = $ad->whereRaw($query)->whereNotIn('status', [2, 3, 5])->get(); //query without status (deleted, blocked, moderated)

        return view('search', [
            'searchResult' => $ad,
            'searchWord' => $request->input('name') ?? NULL,
            'categories' => $caterory->orderBy('title', 'asc')->get(),
            'categorise_selected' => $request->input('category') ?? NULL,
            'cities' => $city->orderBy('name', 'asc')->get(),
            'city_selected' => $request->input('city') ?? NULL,
            'archived_checked' => $request->input('status') ?? NULL,
            'barter_types' => [
                ['barter', 'Обмен'],
                ['free','Даров']
            ],
            'barter_type_selected' => $request->input('barter_type') ?? NULL,
        ]);
    }
}
