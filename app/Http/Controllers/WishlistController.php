<?php

namespace App\Http\Controllers;

use App\Models\AdUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
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
    public function store(Request $request, AdUser $adUser)
    {
        $user = auth()->id();
        $ad = $request->input('ad_id');
        $adUser->fill(['user_id' => $user, 'ad_id' => $ad]);
        $adUser->save();

        return redirect()->back()->with('success', 'Вы откликнулись на объявление.');
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
    public function destroy(AdUser $adUser, $id)
    {
        $adUser = $adUser->where('user_id', Auth::id())->where('ad_id', $id)->first();
        AdUser::destroy($adUser->id);
        return redirect()->back()->with('success', 'Вы отказались от объявления.');
    }
}
