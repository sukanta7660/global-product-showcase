<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $shops = Shop::latest()->get();
        return view('admin.shop.shop', compact('shops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Shop $shop) :RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|min:3|max:35|unique:shops,name',
            'slug' => 'required|string|min:3|max:50|unique:shops,slug',
            'about' => 'nullable|string',
            'cell' => 'required|string',
            'email' => 'required|email',
            'sort' => 'integer',
        ]);

        $created = $shop->create($request->all());

        return Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop) :RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|min:3|max:35|unique:shops,name'.$shop->id,
            'slug' => 'required|string|min:3|max:50|unique:shops,slug'.$shop->id,
            'about' => 'nullable|string',
            'cell' => 'required|string',
            'email' => 'required|email',
            'sort' => 'integer',
        ]);

        $created = $shop->update($request->all());

        return Redirect::back();    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop) :RedirectResponse
    {
        $shop->delete();
        return Redirect::back();
    }

    private function validateData($request, $shop) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|min:3|max:35|unique:shops,name'.$shop?->id,
            'slug' => 'required|string|min:3|max:50|unique:shops,slug'.$shop->id,
            'about' => 'nullable|string',
            'cell' => 'required|string',
            'email' => 'required|email',
            'sort' => 'integer',
        ]);
    }
}
