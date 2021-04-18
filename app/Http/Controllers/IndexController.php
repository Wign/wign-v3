<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Sign;
use App\Models\Word;
use Illuminate\Support\Collection;
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

        $this->cleanRequests($requests);

        return Inertia::render('Index', ['signs' => $signs, 'requests' => $requests, 'counts' => ['signs' => $countSigns, 'requests' => $countRequets, 'words' => $countWords], 'background' => ['url' => 'images/background/viggo/eksamen-tegning.jpg', 'title' => 'De 4 Skoler', 'artist' => 'Alexei Svetlov']]);
    }


    /**
     * Limits the requests list by a character limiter $limit that enforces a policy on
     * how many requests we can display on front before it's bloated by many long words
     * Defaults to 100 characters as a limit. It can have 10+ requests with 10 characters each,
     * or just 5 requests if they have 20 characters each.
     *
     * @param Collection $requests
     * @param int $limit
     */
    private function cleanRequests(Collection $requests, int $limit = 100) {
        $totalChars = 0;

        foreach ($requests as $request) {
            $totalChars += strlen($request->word->literal);
        }

        while($totalChars >= $limit) {
            $totalChars -= strlen($requests->first()->word->literal);
            $requests->shift();
        }
    }
}
