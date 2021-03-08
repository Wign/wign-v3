<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SignController extends Controller
{
    public function random(Request $request)
    {
        $sign = Sign::inRandomOrder()->first();
        return Inertia::render('Wign/Sign', ['sign' => $sign]);
    }
}
