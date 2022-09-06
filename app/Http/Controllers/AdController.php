<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ads\StoreRequest;
use App\Http\Requests\Ads\UpdateRequest;
use App\Models\Ad;
use App\Models\AdStatus;
use App\Models\AdUser;
use App\Models\AdUserFavorite;
use App\Models\User;
use App\Services\ImageService;
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
    public function store(StoreRequest $request, ImageService $imageService)
    {
        if (!Auth::check()) {
            return abort(404);
        }
        $validated = $request->safe()->all();
        $ad = new Ad($validated);
        if ($ad->save()) {

            if ($request->hasFile('image')) {
                $image = $imageService->saveNewAdImage($validated['user_id'], $request->file('image'));
                $ad->images()->save($image);
            }

            return redirect()->route('user.profile.listAds')->with('success', 'Объявление успешно отправлено на модерацию. После одобрения модераторм его статус изменится на активно!');
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
     * @param  App\Http\Requests\Ads\UpdateRequest  $request
     * @param App\Models\Ad $ad
     * @param  App\Services\ImageService $imageService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Ad $ad, ImageService $imageService)
    {
        $validated = $request->safe()->only(['title', 'text', 'category_id', 'city_id', 'barter_type', 'status_id', 'user_id']);
        $imageData = $request->safe()->only(['imageMain', 'removeImage']);
        $imageService->updateExistingAdImage($imageData);
        if ($request->hasFile('image')) {
            $image = $imageService->saveExistingAdImage($validated['user_id'], $request->file('image'), $ad->id);
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
     * @param  Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $deletedStatus = AdStatus::where('title', 'deleted')->get()->first()->id;
        $ad->status_id = $deletedStatus;
        if ($ad->save()) {
            return redirect()->route('user.profile.listAds')->with('success', 'Обявление успешно удалено!');
        } else {
            return back()->with('fail', 'Ошибка удаления объявления!');
        }
    }
}
