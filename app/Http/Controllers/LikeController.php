<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request)
    {
        $request->validate([
            'signId' => ['required', 'Numeric']
        ]);

        $sign = Sign::findOrFail($request->input('signId'));
        $user = Auth::user();

        if (isset($user)) {
            $result = $user->likes()->toggle($sign);
            $sign->loadCount('likes');

            $likes = $sign->likes_count;
            $liked = count($result['attached']) > 0;

            return response()->json(['success' => true, 'likes' => $likes, 'liked' => $liked]);
        } else {
            return response()->json(['success' => false, 'error' => ['User is not logged in!']], 400);
        }
    }
}
