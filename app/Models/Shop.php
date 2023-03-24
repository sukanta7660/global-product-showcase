<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends BaseModel
{

    protected $appends = [
        'latitude', 'longitude', 'location_name'
    ];

    /*-------------------------------------
    ----------------Scopes----------------*/
    public function getLatitudeAttribute() :string
    {
        return $this->location->latitude;
    }

    public function getLongitudeAttribute() :string
    {
        return $this->location->longitude;
    }

    public function getLocationNameAttribute() :string
    {
        return $this->location->name;
    }

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
