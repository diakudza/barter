<?php

namespace App\Http\Controllers;

use App\Models\AdUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AdUser $adUser, $fromJs = false)
    {
        $user = auth()->id();
        $ad = $request->input('ad_id');
        $adUser->fill(['user_id' => $user, 'ad_id' => $ad]);
        $adUser->save();
        if (!$fromJs) {
            return redirect()->back()->with('success', 'Вы откликнулись на объявление.');
        } else {
            return (['message' => 'добавлено в избранное']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdUser $adUser, $id, $fromJs = false)
    {
        $adUser = $adUser->where('user_id', Auth::id())->where('ad_id', $id)->first();
        AdUser::destroy($adUser->id);
        if (!$fromJs) {
            return redirect()->back()->with('success', 'Вы отказались от объявления.');
        } else {
            return (['message' => 'добавлено в избранное']);
        }
    }
}
