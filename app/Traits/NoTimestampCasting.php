<?php

namespace App\Traits;


/**
 * Can only be used with Model
 */

trait NoTimestampCasting
{
    /********************
     * Getters
     * /*******************/

    public function getCreatedAtAttribute() :string|null
    {
        return $this->getRawOriginal('created_at');
    }

    public function getUpdatedAtAttribute() :string|null
    {
        return $this->getRawOriginal('updated_at');
    }
}
