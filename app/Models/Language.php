<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $code
 * @property string|null $text
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $defaultSignLanguages
 * @property-read int|null $default_sign_languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $defaultTextLanguages
 * @property-read int|null $default_text_languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sign[] $signs
 * @property-read int|null $signs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Word[] $words
 * @property-read int|null $words_count
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Query\Builder|Language onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereType($value)
 * @method static \Illuminate\Database\Query\Builder|Language withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Language withoutTrashed()
 * @mixin \Eloquent
 */
class Language extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->hasMany(User::class, 'text_language_id');
    }

    public function defaultSignLanguages()
    {
        return $this->hasMany(User::class, 'sign_language_id');
    }
}
