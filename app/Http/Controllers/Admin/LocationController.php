<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

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

        $location->create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return Redirect::back();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => 'required | unique:locations,name',
        ]);

        $location->update([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location) :RedirectResponse
    {
        $location->delete();
        return Redirect::back();
    }
}
