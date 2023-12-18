<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Rating;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        return view('pages.app.menu_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:1024'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = Str::random(5) . '_' . $file->getClientOriginalName();
            $file->storeAs('public/menu', $name);
            $validatedData['image'] = $name;
        }

        Menu::create($validatedData);

        return redirect()->route('app.menu')->with('success', 'Created menu successfully');
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
        return view('pages.app.menu_edit', [
            'data' => Menu::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Menu::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
            'status' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $oldFile = $data->image;

            if ($oldFile) {
                Storage::delete('public/menu/' . $oldFile);
            }

            $file = $request->file('image');
            $name = Str::random(5) . '_' . $file->getClientOriginalName();
            $file->storeAs('public/menu', $name);
            $validatedData['image'] = $name;
        }

        $data->update($validatedData);

        return redirect()->route('app.menu')->with('success', 'Updated menu successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Menu::findOrFail($id);
        Storage::delete('public/menu/' . $data->image);
        $data->delete();
        return redirect()->route('app.menu')->with('success', 'Deleted menu successfully');
    }
}
