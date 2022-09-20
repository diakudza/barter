<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class AdmCityController extends Controller
{
    public function getAllCities(City $city, Region $region)
    {
        return view('admin.cities', [
            'array' => $city->orderBy('name', 'asc')->paginate(20),
            'regions' => $region->select('id', 'name')->orderBy('name', 'asc')->get()]);
    }

    public function getAllRegions(Region $region)
    {
        return ($region->select('id', 'name')->orderBy('name', 'asc')->get());
    }

    public function storeCity(Request $request, City $city)
    {
        $city->fill($request->all());
        $city->save();
        return redirect()->back()->with('success', 'Город добавлен');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function updateCity(Request $request, $id, City $city)
    {
        $city= $city->find($id);
        $city->update($request->all());
        $city->save();
        return redirect()->back()->with('success', 'Город обновлен');
    }

    public function destroyCity($id, City $city)
    {
        $city = $city->find($id);
        $city->deleteOrFail();
        return redirect()->back()->with('success', 'Город удален');
    }
}
