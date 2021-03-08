<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use Auth;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function increment(Request $request)
    {
        $request->validate([
            'signId' => ['required', 'Numeric']
        ]);

        $sign = Sign::findOrFail($request->input('signId'));
        $user = Auth::user();

        if (isset($user)) {
            $user->views()->attach($sign);
        }

        $result = $sign->increment('playings');

        return ['success' => $result == 1, 'playings' => $sign->playings];
    }
}
