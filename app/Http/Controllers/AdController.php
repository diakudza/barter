<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ads\StoreRequest;
use App\Http\Requests\Ads\UpdateRequest;
use App\Models\Ad;
use App\Models\AdUser;
use App\Models\AdUserFavorite;
use App\Models\Category;
use App\Models\City;
use App\Models\Image;
use App\Models\User;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Ads\StoreRequest  $request
     * @param  App\Services\UploadService $uploadService
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, UploadService $uploadService)
    {
        if (!Auth::check()) {
            return abort(404);
        }
        $validated = $request->safe()->all();

        $ad = new Ad($validated);
        if ($ad->save()) {
            if ($request->hasFile('image')) {
                $image = new Image([
                    'user_id' => $validated['user_id'],
                    'path' => $uploadService->uploadImage($request->file('image')),
                    'image_type' => 0
                ]);
                $ad->images()->save($image);
            }

            return redirect()->route('searchPage')->with('success', 'Объявление успешно добавлено!');
        } else {
            return back()->with('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad, AdUser $adUser, AdUserFavorite $favorite)
    {
        if ($ad->status == '2') {
            return abort(404);
        }

        $user = User::find(Auth::id());

        if (auth()->user()) {

            if ($user->wishes()->where('ad_id', $ad->id)->first()) {
                $thisUserWishes = true;
            } else {
                $thisUserWishes = false;
            }

            if ($user->favoriteAds()->where('ad_id', $ad->id)->count()) {
                $thisUserFavoriteAd = true;
            } else {
                $thisUserFavoriteAd = false;
            }
        }
        $ad->update(['show_count' => ++$ad->show_count]);
        $inwishlist = $adUser->where('ad_id', $ad->id)->count();
        $inFavorites = $favorite->where('ad_id', $ad->id)->count();

        return view('adShow', [
            'ad' => $ad,
            'userWishes' => $thisUserWishes ?? NULL,
            'userFavorite' => $thisUserFavoriteAd ?? NULL,
            'infavorites' => $inFavorites ?? 0,
            'inwishlist' => $inwishlist ?? 0,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Ad $ad, UploadService $uploadService)
    {
        $validated = $request->safe()->only(['title', 'text', 'category_id', 'city_id', 'barter_type', 'status_id']);
        $imageData = $request->safe()->only(['imageMain', 'removeImage']);
        if (Arr::has($imageData, 'removeImage')) {
            $imagesToRemove = Image::whereIn('id', $imageData['removeImage'])->get();
            foreach ($imagesToRemove as $imageToRemove) {
                $uploadService->removeImage($imageToRemove->path);
            }
            Image::destroy($imageData['removeImage']);
        }
        if (Arr::has($imageData, 'imageMain')) {
            $newMainImage = Image::findOrFail($imageData['imageMain']);
            $newMainImage->image_type = 0;
            $newMainImage->save();
        }
        if ($request->hasFile('image')) {
            $image = new Image([
                'user_id' => $ad->user_id,
                'path' => $uploadService->uploadImage($request->file('image')),
                'image_type' => 1
            ]);
        }
        $ad = $ad->fill($validated);
        if ($ad->update()) {
            if (isset($image)) {
                $ad->images()->save($image);
            }
            return redirect()->route('user.profile.listAds')->with('success', 'Обявление успешно обновлено!');
        } else {
            return back()->with('fail', 'Ошибка обновления объявления!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
