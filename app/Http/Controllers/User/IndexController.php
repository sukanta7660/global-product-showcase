<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Product;
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
        $latitude = $request->latitude;
        $longitude = $request->longitude;

//        $distance = 10000;

        $shops = Shop::selectRaw("*, ( 6371 * acos( cos( radians(?) ) *
            cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) *
            sin( radians( latitude ) ) ) ) AS distance")
            ->orderBy("distance", "asc")
            ->setBindings([$latitude, $longitude, $latitude])
            ->take(10)
            ->get();

        $products = Product::join('shops', 'shops.id', '=', 'products.shop_id')
            ->where('products.name', 'LIKE', '%'. $request->search .'%')
            ->whereIn('shops.id', $shops->pluck('id')->toArray())
            ->with('shop')
            ->get();

        return response()->json($products);
    }
}
