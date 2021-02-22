<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Language
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @mixin \Eloquent
 */
class Language extends Model
{
    use HasFactory;

    public function signs()
    {
        return $this->hasMany(Sign::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function defaultTextLanguages()
    {
        return $this->hasMany(User::class);
    }

    public function defaultSignLanguages()
    {
        return $this->hasMany(User::class);
    }
}
