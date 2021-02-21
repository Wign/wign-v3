<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sign
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Description[] $descriptions
 * @property-read int|null $descriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign query()
 * @mixin \Eloquent
 */
class Sign extends Model
{
    use HasFactory;

    public function descriptions() {
        return $this->morphMany(Description::class, 'descriptionable');
    }
}
