<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index() :View
    {
        return view('user.home');
    }

    public function findShops(Request $request) :JsonResponse
    {
        dd($request->all());
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $distance = 10; // Distance in kilometers

        $shops = Shop::select(DB::raw('*, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance'))
            ->having('distance', '<', $distance)
            ->orderBy('distance')
            ->get();

        return response()->json(['shops' => $shops]);
    }
}
