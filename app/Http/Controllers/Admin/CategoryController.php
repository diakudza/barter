<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\App\Models\Category $category)
    {
        return view('admin.categories', ['categories' => $category->all()]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, \App\Models\Category $category)
    {
        $category->fill($request->all());
        $category->save();
        return redirect(route('category.index'))->with('success', "Категория \" {$request->input('title')}\" добавлена");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Models\Category $category)
    {
        return view('admin.categories', [
            'categories' => $category->all(),
            'editedCategory' => $category->id,
            'route' => route('category.update', $category->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( \App\Models\Category $category, Request $request)
    {
        $category->fill($request->all());
        $category->save();
        return redirect(route('category.index'))->with('success', 'Категория Обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Models\Category $category)
    {
        $category->deleteOrFail();
        return redirect(route('category.index'))->with('success', 'Категория удалена');
    }
}
