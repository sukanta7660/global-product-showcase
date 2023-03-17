<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    public function price(): Attribute
    {
        return new Attribute(
            fn($value) => ($value / 100),
            fn($value) => ($value * 100),
        );
    }

    public function discountPrice(): Attribute
    {
        return new Attribute(
            fn($value) => ($value / 100),
            fn($value) => ($value * 100),
        );
    }
}
