<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Description
 *
 * @property int $id
 * @property string $text
 * @property int $sign_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Sign $sign
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Description newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Description newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Description query()
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereSignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereUpdatedAt($value)
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
