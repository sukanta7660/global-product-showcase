<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /*
     * Add a specific method display the dashboard page
     */

    public function index() :View
    {
        $products = Product::all();
        $shops = Shop::all();
        $locations = Location::all();
        return view('admin.dashboard.dashboard', compact('shops', 'locations', 'products'));
    }
}
