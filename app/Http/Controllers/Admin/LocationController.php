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
        $locations = Location::latest()->get();
        return view('admin.location.location', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
