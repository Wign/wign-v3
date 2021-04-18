<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Inertia\Inertia;

class WordController extends Controller
{
    public function show()
    {
        $word = Word::all();
        return Inertia::render('Words', ['words' => $word]);
    }

    // TODO later time: Change it to a actual search index by external provider as Elastic Search.
    public function search(string $word)
    {
        return Word::has('signs')
            ->where('literal', 'like', "$word%")
            ->take(10)
            ->get();
    }
}
