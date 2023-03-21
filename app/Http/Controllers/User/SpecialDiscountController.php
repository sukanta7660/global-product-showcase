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
            ->whereStatus(true)
            ->get()
        ;
        return view('user.specialDiscount', compact('discountProducts'));
    }
}
