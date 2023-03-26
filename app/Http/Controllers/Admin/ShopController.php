<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Shop;
use Helper;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $shops = Shop::latest()->paginate(10);
        $locations = Location::whereStatus(1)->get();
        return view('admin.shop.shop', compact('shops', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Shop $shop) :RedirectResponse
    {
        $this->validateData($request);

        try {

            $location = Location::whereSlug(Str::slug($request->location_name))->updateOrCreate([
                'name'      => $request->location_name,
                'slug'      => Str::slug($request->location_name),
                'latitude'  => $request->latitude,
                'longitude' => $request->longitude,
                'status'    => true
            ]);

            $shop->create(array_merge($request->all(), [
                'location_id' => $location->id
            ]));

            if (!isset($request->status)) {
                $shop->update(['status' => false]);
            }

        } catch (QueryException $exception) {
            return Helper::sendResponse(500, 'error', 'Error', $exception->getMessage());
        }

        return Helper::sendResponse(200,
            'success',
            'Success',
            'Shop Successfully Created');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop) :RedirectResponse
    {
        $this->validateData($request, $shop);

        try {

//            dd($shop->location);

            $location = Location::where('id', $shop->location_id)->update([
                'name'      => $request->location_name,
                'slug'      => Str::slug($request->location_name),
                'latitude'  => $request->latitude,
                'longitude' => $request->longitude,
                'status'    => true
            ]);

            $shop->update($request->except(['_token', '_method']));

            if (!isset($request->status)) {
                $shop->update(['status' => false]);
            }

        } catch (QueryException $exception) {
            return Helper::sendResponse(500, 'error', 'Error', $exception->getMessage());
        }

        return Helper::sendResponse(200,
            'success',
            'Success',
            'Shop Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop) :RedirectResponse
    {
        try {

            $this->deletedRelatedData($shop);

            $shop->delete();

        } catch (QueryException $exception) {
            return Helper::sendResponse(500, 'error', 'Error', $exception->getMessage());
        }
        return Helper::sendResponse(200,
            'success',
            'Success',
            'Shop Successfully Deleted');
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
            'location_name' => 'required',
            'name' => "required|string|min:3|max:35|{$uniqueName}",
            'slug' => "required|string|min:3|max:50|{$uniqueSlug}",
            'about' => 'nullable|string',
            'cell' => 'required|string',
            'email' => 'required|email',
            'sort' => 'nullable|integer',
            'status' => 'boolean'
        ]);
    }

    private function deletedRelatedData ($shop) :void
    {
        $shop->products()->delete();
        $shop->coupons()->delete();
    }
}
