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
}
