<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Art
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Art newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Art newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Art query()
 * @mixin \Eloquent
 */
class Art extends Model
{
    use HasFactory;

    public function artist()
    {
        return $this->hasOne(Art::class);
    }
}
