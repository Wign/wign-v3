<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Sign;
use App\Models\Word;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function show()
    {
        $signs = Sign::with('word:id,literal')->inRandomOrder()->limit(8)->get();
        $requests = Request::with('word:id,literal')->inRandomOrder()->limit(10)->get();
        $countSigns = Sign::has('word')->count();
        $countRequets = Request::has('word')->count();
        $countWords = Word::has('signs')->count();
        // TODO: Get art & artist, and pass it into the page

        return Inertia::render('Index', ['signs' => $signs, 'requests' => $requests, 'counts' => ['signs' => $countSigns, 'requests' => $countRequets, 'words' => $countWords], 'background' => ['url' => 'images/background/viggo/eksamen-tegning.jpg', 'title' => 'De 4 Skoler', 'artist' => 'Alexei Svetlov']]);    }
}
