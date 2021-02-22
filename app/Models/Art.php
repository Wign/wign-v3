<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Art
 *
 * @property int $id
 * @property int $artist_id
 * @property string|null $title
 * @property string|null $year
 * @property string|null $publish Ferniseringsdato (ikke oprettelsesdato på Wign)
 * @property int $visible
 * @property string $filename
 * @property int $views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Art[] $art
 * @property-read int|null $art_count
 * @method static \Illuminate\Database\Eloquent\Builder|Art newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Art newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Art query()
 * @method static \Illuminate\Database\Eloquent\Builder|Art whereArtistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Art whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Art whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Art whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Art wherePublish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Art whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Art whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Art whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Art whereVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Art whereYear($value)
 * @mixin \Eloquent
 */
class Art extends Model
{
    use HasFactory;

    public function art()
    {
        return $this->hasMany(Art::class);
    }
}
