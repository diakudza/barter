<?php

namespace App\Http\Controllers;


use App\Models\AdStatus;

use App\Queries\QueryBuilderAds;
use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderCities;
use App\Queries\QueryBuilderStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index(QueryBuilderAds $adsList)
    {
        return view('user.profile.index', [
            'ads' => $adsList->listAdsByUser(Auth::user()->id),
            'wishes' => Auth::user()->wishes,
            'favorites' => Auth::user()->favoriteAds
            ]);
    }

    public function createAd(
        QueryBuilderCategories $categoriesList,
        QueryBuilderCities $citiesList
    ) {
        return view('user.profile.createAd', [
            'categoriesList' => $categoriesList->listItems(['id', 'title']),
            'citiesList' => $citiesList->listItems(['id', 'name'])
        ]);
    }

    public function listAds(QueryBuilderAds $adsList)
    {
        return view('user.profile.listAds', ['ads' => $adsList->listAdsByUser(Auth::user()->id)]);
    }

    public function editAd(
        Request $request,
        QueryBuilderAds $adsDetail,
        QueryBuilderCategories $categoriesList,
        QueryBuilderCities $citiesList,
        AdStatus $statusesList
    ) {
        $ad = $adsDetail->getAdDetailById($request->ad);
        $allowedStatuses = $statusesList->getAllPublicStatuses();
        if($allowedStatuses->search($ad->status) === false){
            $allowedStatuses = [];
            $allowedStatuses[] = $ad->status;
        }
        return view('user.profile.editAd', [
            'ad' => $ad,
            'categoriesList' => $categoriesList->listItems(['id', 'title']),
            'citiesList' => $citiesList->listItems(['id', 'name']),
            'statusesList' => $allowedStatuses
        ]);
    }

    public function personalData()
    {
        return view('user.profile.personalData');
    }

    public function resetPassword()
    {
        return view('user.profile.resetPassword');
    }
}
