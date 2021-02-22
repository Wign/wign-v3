<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Description
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Description newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Description newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Description query()
 * @mixin \Eloquent
 */
class Description extends Model
{
    use HasFactory;

    public function sign()
    {
        return $this->belongsTo(Sign::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
