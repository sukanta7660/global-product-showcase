<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpecialDiscountController extends Controller
{
    public function index() :View
    {
        $discountProducts = Product::where('discount_enabled', true)
            ->with('shop')
            ->whereStatus(true)
            ->paginate(10)
        ;
        return view('user.specialDiscount', compact('discountProducts'));
    }
}
