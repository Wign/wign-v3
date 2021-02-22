<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Artist
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Artist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist query()
 * @mixin \Eloquent
 */
class Artist extends Model
{
    use HasFactory;

    public function art()
    {
        return $this->belongsTo(Artist::class);
    }
}
