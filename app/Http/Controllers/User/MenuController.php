<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Rating;
use App\Models\Transaction;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::where('status', 'Available')->get();

        $totalSold = [];
        $averageRatings = [];

        foreach ($menus as $menu) {
            $totalSold[$menu->id] = Transaction::where(['menu_id' => $menu->id, 'status' => 'Done'])->sum('quantity');
            $averageRatings[$menu->id] = Rating::where('menu_id', $menu->id)->avg('rating');
        }

        return view('pages.app.menu', [
            'data' => Menu::all(),
            'totalSold' => $totalSold,
            'averageRatings' => $averageRatings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
