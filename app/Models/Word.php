<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Word
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Description[] $descriptions
 * @property-read int|null $descriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Word newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Word newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Word query()
 * @mixin \Eloquent
 */
class Word extends Model
{
    use HasFactory;

    public function descriptions()
    {
        return $this->morphMany(Description::class, 'descriptionable');
    }
}
