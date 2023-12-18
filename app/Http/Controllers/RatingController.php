<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index($code)
    {
        $menu = Order::where(['code' => $code])->get();
        $dataBuyer = Order::where('code', $code)->first();
        return view('pages.app.rating', [
            'menu' => $menu,
            'dataBuyer' => $dataBuyer
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id.*' => 'required',
            'menu_id.*' => 'required',
            'ratings' => 'required',
            'code.*' => 'required',
        ]);

        $userIds = $validated['user_id'];
        $menuIds = $validated['menu_id'];
        $ratings = $validated['ratings'];
        $code = $validated['code'];

        $count = count($userIds);


        for ($i = 0; $i < $count; $i++) {
            Rating::create([
                'user_id' => $userIds[$i],
                'menu_id' => $menuIds[$i],
                'rating' => $ratings,
                'code' => $code[$i],
            ]);
        }

        return redirect()->route('orders')->with('success', 'Thanks for shopping');
    }
}
