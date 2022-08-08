<?php

namespace App\Http\Controllers;

use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderCities;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('user.profile.index');
    }

    public function createAd(QueryBuilderCategories $categoriesList,
    QueryBuilderCities $citiesList) {
        return view('user.profile.createAd', [
            'categoriesList' => $categoriesList->listItems(['id', 'title']),
            'citiesList' => $citiesList->listItems(['id', 'name'])
        ]);
    }
}
