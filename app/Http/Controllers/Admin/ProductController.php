<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $products = Product::latest()->paginate(10);
        $shops = Shop::whereStatus(1)->get();
        return view('admin.product.product', compact('products', 'shops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Shop $shop) :RedirectResponse
    {
        $this->validateData($request);

        $shop->create($request->all());

        if (!isset($request->status)) {
            $shop->update(['status' => false]);
        }

        return Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop) :RedirectResponse
    {
        $this->validateData($request, $shop);

        $shop->update($request->except(['_token', '_method']));

        if (!isset($request->status)) {
            $shop->update(['status' => false]);
        }

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop) :RedirectResponse
    {
        $shop->delete();
        return Redirect::back();
    }

    private function validateData($request, $shop = null) :void
    {
        $uniqueName = ($request->method() == 'PATCH')
            ? "unique:shops,name,{$shop->id}"
            : 'unique:shops,name';
        $uniqueSlug = ($request->method() == 'PATCH')
            ? "unique:shops,slug,{$shop->id}"
            : 'unique:shops,slug';

        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'name' => "required|string|min:3|max:35|{$uniqueName}",
            'slug' => "required|string|min:3|max:50|{$uniqueSlug}",
            'about' => 'nullable|string',
            'cell' => 'required|string',
            'email' => 'required|email',
            'sort' => 'integer',
            'status' => 'boolean'
        ]);
    }
}
