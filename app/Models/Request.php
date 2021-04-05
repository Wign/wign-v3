<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Request
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request query()
 * @mixin \Eloquent
 */
class Request extends Pivot
{
    protected $table = 'requests';

    public function word() {
        return $this->belongsTo(Word::class);
    }

    public function requester() {
        return $this->belongsTo(User::class);
    }
}
