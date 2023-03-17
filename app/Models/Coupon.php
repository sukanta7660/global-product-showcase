<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends BaseModel
{
    public function couponPrice(): Attribute
    {
        return new Attribute(
            fn($value) => ($value / 100),
            fn($value) => ($value * 100),
        );
    }
}
