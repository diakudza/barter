<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ads\StoreRequest;
use App\Http\Requests\Ads\UpdateRequest;
use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use App\Services\UploadService;
use Illuminate\Http\Request;
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
        if ($request->hasFile('image')) {
            $validated['image'] = $uploadService->uploadImage($request->file('image'));
        }
        $ad = new Ad($validated);
        if ($ad->save()) {
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
    public function show(Ad $ad)
    {
        if ($ad->status == '2') {
            return abort(404);
        }

        return view('adShow', [
            'ad' => $ad
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
        $validated = $request->safe()->only(['title', 'text', 'category_id', 'city_id', 'barter_type']);
        if ($request->hasFile('image')) {
            if ($uploadService->removeImage($ad->image)) {
                $validated['image'] = $uploadService->uploadImage($request->file('image'));
            }
        }
        $ad = $ad->fill($validated);
        if ($ad->save()) {
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
