<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Helper;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;
use function Pest\Laravel\delete;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $locations = Location::latest()->paginate(10);
        return view('admin.location.location', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Location $location) :RedirectResponse
    {
        $request->validate([
            'name' => 'required | unique:locations,name'
        ]);

        try {

            $location->create([
                'name'      => $request->name,
                'slug'      => Str::slug($request->name),
                'latitude'  => $request->latitude,
                'longitude' => $request->longitude,
            ]);

        } catch (QueryException $exception) {
            return Helper::sendResponse(500, 'error', 'Error', $exception->getMessage());
        }

        return Helper::sendResponse(200,
            'success',
            'Success',
            'Location Successfully Created');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => 'required | unique:locations,name',
        ]);

        try {

            $location->update([
                'name'      => $request->name,
                'slug'      => Str::slug($request->name),
                'latitude'  => $request->latitude,
                'longitude' => $request->longitude,
            ]);

        } catch (QueryException $exception) {
            return Helper::sendResponse(500, 'error', 'Error', $exception->getMessage());
        }

        return Helper::sendResponse(200,
            'success',
            'Success',
            'Location Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location) :RedirectResponse
    {
        $this->deleteLocationRelatedData($location);

        if (!$location->delete()) {
            return Helper::sendResponse(500, 'error', 'Error', 'Something Went Wrong');
        }

        return Helper::sendResponse(200,
            'success',
            'Success',
            'Location Successfully Deleted');
    }

    /*
     * Delete all relation data
     */

    private function deleteLocationRelatedData($location) :void
    {
        if ($location->shops) {
            $location->shops->each(function ($shop) {
                $shop->coupons()->delete();
                $shop->products()->delete();
            });
            $location->shops()->delete();
        }
    }
}
