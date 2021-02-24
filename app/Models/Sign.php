<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Sign
 *
 * @property int $id
 * @property string $video_uuid
 * @property string $video_url
 * @property string $thumbnail_url
 * @property string $small_thumbnail_url
 * @property int $playings
 * @property int $sign_language_id
 * @property int $word_id
 * @property int|null $creator_id Creator can be nullable, but only in certain situations, where the creator have grant permission to let the signs keep here
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $creator
 * @property-read \App\Models\Description|null $descriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\Language $signLanguage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign newQuery()
 * @method static \Illuminate\Database\Query\Builder|Sign onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign wherePlayings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereSignLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereSmallThumbnailUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereThumbnailUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereVideoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereVideoUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sign whereWordId($value)
 * @method static \Illuminate\Database\Query\Builder|Sign withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Sign withoutTrashed()
 * @mixin \Eloquent
 */
class Sign extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function signLanguage()
    {
        return $this->belongsTo(Language::class, 'sign_language_id');
    }

    public function word() {
        return $this->belongsTo(Word::class);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')->as('likes')->using(Like::class)->withTimestamps();
    }

    public function views()
    {
        return $this->belongsToMany(User::class, 'views')->as('views')->withTimestamps();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
