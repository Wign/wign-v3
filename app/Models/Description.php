<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * Get the parent commentable model (post or video).
     */
    public function descriptionable()
    {
        return $this->morphTo();
    }
}
