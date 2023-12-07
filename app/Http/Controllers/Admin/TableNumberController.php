<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TableNumber;
use Illuminate\Http\Request;

class TableNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('pages.app.table_number');
    }

    public function getData()
    {
        return view('pages.app.display_table_number')->with([
            'data' => TableNumber::all()
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
        $request->validate([
            'number' => 'required|numeric|unique:table_numbers',
        ]);
        TableNumber::create([
            'number' => $request->number,
            'status' => 'Empty'
        ]);

        return response()->json(['message' => 'Add data successfully']);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataInput = $request->validate([
            'number' => 'required|numeric|unique:table_numbers,number,' . $id,
            'status' => 'required'
        ]);
        $data = TableNumber::findOrFail($id);
        $data->update($dataInput);

        return redirect()->route('app.table_number');
        // return response()->json(['message' => 'Updated data successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TableNumber::findOrFail($id);

        $data->delete();

        return redirect()->route('app.table_number');
        // return response()->json(['message', 'Deleted data successfully']);
    }
}
