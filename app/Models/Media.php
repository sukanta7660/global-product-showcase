<?php

namespace App\Models;

use App\Traits\MediaMan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    use HasFactory, MediaMan;

    protected $guarded = ['id'];
    protected $appends = ['url'];
    protected $hidden = ['media_type', 'media_id', 'media_role'];

    public function media() :MorphTo
    {
        return $this->morphTo();
    }

    public function getUrlAttribute(): string
    {
        // Send Url For Frontend Preview
        return url('storage/' . $this->attributes['path'] . '/' . $this->attributes['name']);
    }
}
