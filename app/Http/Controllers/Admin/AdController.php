<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdStatus;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Ad $ad, AdStatus $statuses, \App\Models\Category $categories, Request $request)
    {
        $status = $request->input('status');
        $ads = $ad
            ->when($status, function($query, $status){
                $query->whereIn('status_id', $status);
            })
            ->paginate(20)
            ->withQueryString();
        return view('Admin.Ads', [
            'ads' => $ads,
            'statuses' => $statuses->all(),
            'categories' => $categories->all(),
            'filterStatuses' => $status,
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return view('Admin.Ad', ['ad' => $ad]);
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
    public function update(Request $request, Ad $ad)
    {
        $ad->fill($request->all());
        $ad->update();
        return redirect()->back()->with('success', 'Обновил обьявление');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->deleteOrFail();
        return redirect()->back()->with('success', 'Обьявление удалено!');
    }
}
