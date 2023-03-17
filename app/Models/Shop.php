<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shop extends BaseModel
{
    use HasFactory;

    /*--------------------------------------
    ----------------Relations--------------*/

    public function location() :BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

}
