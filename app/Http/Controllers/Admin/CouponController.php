<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $shops = Shop::whereStatus(1)->get();
        $coupons = Coupon::latest()->paginate(10);

        return view('admin.coupon.coupon', compact('shops', 'coupons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Coupon $coupon) :RedirectResponse
    {
        // validate coupon data
        $this->dataValidate($request);

        // store coupon data
        $coupon->create(array_merge($request->all(), [
            'from'      => dateformat($request->from, 'Y-m-d'),
            'to'        => dateformat($request->to, 'Y-m-d'),
            'status'    => isset($request->status),
        ]));

        return Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon) :RedirectResponse
    {
        // validate coupon data
        $this->dataValidate($request, $coupon);

        // store coupon data
        $coupon->update(array_merge($request->all(), [
            'from'      => dateformat($request->from, 'Y-m-d'),
            'to'        => dateformat($request->to, 'Y-m-d'),
            'status'    => isset($request->status),
        ]));

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon) :RedirectResponse
    {
        $coupon->delete();
        return Redirect::back();
    }

    protected function dataValidate(Request $request, $coupon = null):void
    {
        $uniqueCouponCodeRule = ($request->method() == 'PATCH')
            ? "|unique:coupons,coupon_code,{$coupon->id}"
            : '|unique:coupons,coupon_code';

        $request->validate([
            'coupon_code'       => "required|string|min:3|max:15|{$uniqueCouponCodeRule}",
            'coupon_price'      => 'required|numeric|min:0',
            'from'              => 'required|date|after_or_equal:now',
            'to'                => 'required|date|after_or_equal:from',
            'status'            => 'boolean'
        ]);
    }
}
