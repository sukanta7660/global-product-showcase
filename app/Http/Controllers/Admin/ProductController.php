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
    public function store(Request $request, Product $product) :RedirectResponse
    {
        $this->validateData($request);

        $product->create(array_merge($request->all(), [
            'discount_enabled' => isset($request->discount_enabled),
            'discount_price' => isset($request->discount_enabled) ? $request->discount_price : 0,
            'status' => isset($request->status),
        ]));

        return Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product) :RedirectResponse
    {
        $this->validateData($request, $product);

        $product->update(array_merge($request->except(['_token', '_method']), [
            'discount_enabled' => isset($request->discount_enabled),
            'discount_price' => isset($request->discount_enabled) ? $request->discount_price : 0,
            'status' => isset($request->status),
        ]));

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) :RedirectResponse
    {
        $product->delete();
        return Redirect::back();
    }

    private function validateData($request, $product = null) :void
    {
        $uniqueName = ($request->method() == 'PATCH')
            ? "unique:products,name,{$product->id}"
            : 'unique:products,name';
        $uniqueSlug = ($request->method() == 'PATCH')
            ? "unique:products,slug,{$product->id}"
            : 'unique:products,slug';

        $request->validate([
            'shop_id'           => 'required|exists:shops,id',
            'name'              => "required|string|min:3|max:35|{$uniqueName}",
            'slug'              => "required|string|min:3|max:50|{$uniqueSlug}",
            'description'       => 'nullable|string',
            'price'             => 'required|numeric',
            'quantity'          => 'required|string',
            'discount_enabled'  => 'boolean',
            'discount_price'    => 'nullable|numeric',
            'status'            => 'boolean'
        ]);
    }
}
