<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Word
 *
 * @property int $id
 * @property string $literal
 * @property int $language_id
 * @property int|null $creator_id
 * @property int|null $editor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $creator
 * @property-read \App\Models\User|null $editor
 * @property-read \App\Models\Language $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $requests
 * @property-read int|null $requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sign[] $signs
 * @property-read int|null $signs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Word newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Word newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Word query()
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereEditorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereLiteral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Word extends Model
{
    use HasFactory;

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function signs()
    {
        return $this->hasMany(Sign::class);
    }

    public function requests()
    {
        return $this->belongsToMany(User::class, 'requests')->as('requests')->using(Request::class)->withTimestamps();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }
}
