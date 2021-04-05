<?php

namespace App\Http\Controllers;


use App\Models\Request;

class RequestController extends Controller
{

    /**
     * Fetch a number random requests
     *
     * @param int $num The number of requests to fetch. -1 to fetch all
     * @return \Illuminate\Support\Collection
     */
    public function randomRequests(int $num = 10)
    {
        return Request::with('word')->inRandomOrder()->limit($num)->get();
    }
}
