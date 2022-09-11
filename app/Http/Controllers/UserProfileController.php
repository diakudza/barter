<?php

namespace App\Http\Controllers;


use App\Models\AdStatus;
use App\Models\User;
use App\Queries\QueryBuilderAds;
use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderCities;
use App\Queries\QueryBuilderStatuses;
use App\Queries\QueryBuilderUsers;
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
        QueryBuilderCities     $citiesList
    )
    {
        return view('user.productCart.createAd', [
            'categoriesList' => $categoriesList->listItems(['id', 'title']),
            'citiesList' => $citiesList->listItems(['id', 'name'])
        ]);
    }

    public function listAds()
    {
        Auth::user()->changeAdRead();
        return view('user.profile.listAds', [
            'ads' => Auth::user()->ads
        ]);
    }

    public function editAd(
        Request                $request,
        QueryBuilderAds        $adsDetail,
        QueryBuilderCategories $categoriesList,
        QueryBuilderCities     $citiesList,
        AdStatus               $statusesList
    )
    {
        $ad = $adsDetail->getAdDetailById($request->ad);
        $allowedStatuses = $statusesList->getAllPublicStatuses();
        if ($allowedStatuses->search($ad->status) === false) {
            $allowedStatuses = [];
            $allowedStatuses[] = $ad->status;
        }
        return view('user.productCart.editAd', [
            'ad' => $ad,
            'categoriesList' => $categoriesList->listItems(['id', 'title']),
            'citiesList' => $citiesList->listItems(['id', 'name']),
            'statusesList' => $allowedStatuses
        ]);
    }

    public function personalData(QueryBuilderUsers $usersDetail)
    {
        $user = $usersDetail->getUserDetailById(Auth::user()->id);
        return view('user.profile.personalData', ['user' => $user]);
    }

    public function resetPassword()
    {
        return view('user.profile.resetPassword');
    }

    public function publicInfo($id)
    {
        $user = User::find($id);
        return view('user.profile.publicUserInfo', [
            'user' => $user->where('id', $id)->select('id', 'name', 'created_at', 'rating')->first(),
            'ads' => $user->ads,
            'reviews'=> $user->reviews
        ]);
    }

    public function wishlist(User $user)
    {
        $user = $user->find(auth()->user()->id);
        $user->wishes()->update(['read' => 1]);
        return view('user.profile.yourAdsWishList', [
            'ads' => $user->wishes
        ]);
    }

    public function rateUser(Request $request)
    {
        return view('user.profile.rateUser', ['votedId'=>$request->route('id'), 'voterId'=>Auth::user()->id]);
    }
}
