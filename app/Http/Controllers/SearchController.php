<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Category $caterory, City $city)
    {
        return view('search', ['categories' => $caterory->orderBy('title', 'asc')->get(), 'cities' => $city->orderBy('name', 'asc')->get()]);
    }

    public function search(Request $request, Ad $ad, Category $caterory, City $city)
    {
        $query = '';
        if ($request->input('name')) {
            $query .= (($query)? " AND " : "") . "title like '%" . mb_strtolower($request->input('name')) . "%'";
        }

        if ($request->input('category')) {
            $query .= (($query)? " AND " : "") ."category_id = " . $request->input('category');
        }

        if ($request->input('city')) {
            $query .= (($query)? " AND " : "" ) . "city_id = " . $request->input('city');
        }
        if ($query == '') {
            return redirect()->back()->with('alert', 'не выбран ни один параметр');
        }
        $ad = $ad->whereRaw($query)->get();

        return view('search', [
            'searchResult' => $ad,
            'searchWord' => $request->input('name') ?? NULL,
            'categories' => $caterory->orderBy('title', 'asc')->get(),
            'categorise_selected' => $request->input('category') ?? NULL,
            'cities' => $city->orderBy('name', 'asc')->get(),
            'city_selected' => $request->input('city') ?? NULL,
        ]);
    }
}
