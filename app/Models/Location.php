<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends BaseModel
{

    /*--------------------------------------
    ----------------Relations--------------*/

    public function shops() :HasMany
    {
        return $this->hasMany(Shop::class);
    }
}
