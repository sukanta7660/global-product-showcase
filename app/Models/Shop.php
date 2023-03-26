<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends BaseModel
{
    /*-------------------------------------
    ----------------Scopes----------------*/


    /*--------------------------------------
    ----------------Relations--------------*/

    public function location() :BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function products() :HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function coupons() :HasMany
    {
        return $this->hasMany(Coupon::class);
    }

}
