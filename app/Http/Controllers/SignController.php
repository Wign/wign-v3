<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class SignController extends Controller
{
    public function random()
    {
        $user = Auth::user();
        $sign = Sign::withCount('likes')
            ->when($user, function (Builder $query, $userId) {
                return $query->withCount(['likes as liked' => function ($query) use ($userId) {
                    $query->where('user_id', '=', $userId->id);
                }]);
            })
            ->inRandomOrder()
            ->first();
        $sign->liked = isset($sign->liked) && $sign->liked == 1;
        return Inertia::render('Sign', ['sign' => $sign]);
    }
}
