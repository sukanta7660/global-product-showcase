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
//        dd($request->all());
        $latitude = (int)$request->latitude;
        $longitude = (int)$request->longitude;

        $distance = 10;
    }
}
