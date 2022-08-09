<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdUserFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdUserFavorites extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AdUserFavorite $favorites)
    {
        $user = auth()->id();
        $ad = $request->input('ad_id');
        $favorites->fill(['user_id' => $user, 'ad_id' => $ad]);
        $favorites->save();

        return redirect()->back()->with('success', 'Вы добавили объявление в избранное.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $favorite = AdUserFavorite::where('user_id', Auth::id())->where('ad_id', $request->ad_id)->first();
        AdUserFavorite::destroy($favorite->id);
        return redirect()->back()->with('success', 'Обьявление удалено из избранного.');
    }
}
