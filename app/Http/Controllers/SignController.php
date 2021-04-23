<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use App\Models\Word;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Inertia\Inertia;

class SignController extends Controller
{
    public function random()
    {
        $user = Auth::user();
        $word = Word::has('signs')->with(['signs' => function ($query) use ($user) {
            return $query->withCount('likes')
                ->when($user, function (Builder $query, $userId) {
                    return $query->withCount(['likes as liked' => function ($query) use ($userId) {
                        $query->where('user_id', '=', $userId->id);
                    }]);
                });
        }])->inRandomOrder()
            ->first();

        $word->signs->each(function ($sign) {
            return $sign->liked = isset($sign->liked) && $sign->liked == 1;
        });

        return Inertia::render('Sign', ['word' => $word]);
    }

    public function show(string $literal)
    {
        $user = Auth::user();
        $word = Word::where('literal', $literal)
            ->with(['signs' => function ($query) use ($user) {
                return $query->with(['creator:id,name', 'description'])->withCount('likes')
                    ->when($user, function (Builder $query, $userId) {
                        return $query->withCount(['likes as liked' => function ($query) use ($userId) {
                            $query->where('user_id', '=', $userId->id);
                        }]);
                    });
            }])
            ->first();

        $word->signs->each(function ($sign) {
            return $sign->liked = isset($sign->liked) && $sign->liked == 1;
        });
        return Inertia::render('Sign', ['word' => $word]);
    }

    public function create(string $literal = "")
    {
        return Inertia::render('Create', ['literal' => $literal]);
    }

    public function showReport(int $signId) {
        $sign = Sign::with(['word', 'creator:id,name'])->findOrFail($signId);
        return Inertia::render('Report', ['sign' => $sign]);
    }
}
