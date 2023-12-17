<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'menu_id' => 'required',
            'rating' => 'required',
        ]);

        Rating::create($validated);
        return redirect()->route('orders')->with('success', 'Thanks for shopping');
    }
}
