<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Order::where(['status' => 'Pending'])->orderBy('id', 'DESC')->get()->groupBy('user_id');

        $data = Order::whereIn('status', ['Pending', 'Process', 'Rejected', 'Done', 'Canceled'])->orderBy('id', 'DESC')->get()->groupBy('code');
        $filteredData = $data->map(function ($group) {
            return $group->first();
        });
        $filteredData->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at);
            return $item;
        });

        return view('pages.app.orders', [
            'data' => $filteredData
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
    }

    /**
     * Display the specified resource.
     */
    public function show($code)
    {
        $data = Order::whereIn('status', ['Pending', 'Process', 'Rejected', 'Done', 'Canceled'])->orderBy('id', 'DESC')->get()->groupBy('code');

        $filteredData = $data->map(function ($group) {
            return $group->first();
        });
        $order = Order::where(['code' => $code])->get();
        $dataBuyer = Order::where('code', $code)->first();

        if (!$order) {
            return abort(404);
        }

        // Kirim data pesanan ke view detail
        return view('pages.app.orders_show', [
            'data' => $filteredData,
            'order' => $order,
            'dataBuyer' => $dataBuyer
        ]);
    }


    public function confirmed($code)
    {
        $orders = Order::where('code', $code)->get();

        foreach ($orders as $order) {
            $order->update(['status' => 'Process']);
        }

        return redirect()->route('app.orders')->with('success', 'Confirmed orders successfully');
    }


    public function rejected($code)
    {
        $orders = Order::where('code', $code)->get();

        foreach ($orders as $order) {
            $order->update(['status' => 'Rejected']);
        }

        return redirect()->route('app.orders')->with('success', 'Rejected orders successfully');
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
    public function destroy(string $code)
    {
        $data = Order::where('code', $code)->get();

        foreach ($data as $item) {
            $item->delete();
        }

        return redirect()->route('app.orders')->with('success', 'Deleted order successfully');
    }
}
