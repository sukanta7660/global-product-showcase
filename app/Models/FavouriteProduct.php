<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FavouriteProduct extends BaseModel
{
    /*--------------------------------------
   ----------------Relations--------------*/

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
