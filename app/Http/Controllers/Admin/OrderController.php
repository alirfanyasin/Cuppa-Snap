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
        $data = Order::where(['status' => 'Pending'])->get()->groupBy('user_id');

        $data = Order::where(['status' => 'Pending'])->get()->groupBy('user_id');
        $filteredData = $data->map(function ($group) {
            return $group->first();
        });
        $filteredData->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at);
            return $item;
        });
        // Ambil satu record untuk setiap user_id
        // $filteredData = $data->map(function ($group) {
        //     return $group->first();
        // });

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
    public function show($user_id)
    {
        $data = Order::where(['status' => 'Pending'])->get()->groupBy('user_id');

        // Ambil satu record untuk setiap user_id
        $filteredData = $data->map(function ($group) {
            return $group->first();
        });
        // Ambil pesanan sesuai dengan user_id dan order_id
        $order = Order::where(['user_id' => $user_id])->get();
        $dataBuyer = Order::where('user_id', $user_id)->first();

        // Jika pesanan tidak ditemukan, mungkin hendak menampilkan pesan kesalahan atau redirect ke halaman lain
        if (!$order) {
            return abort(404); // Atau redirect ke halaman lain
        }

        // Kirim data pesanan ke view detail
        return view('pages.app.orders_show', [
            'data' => $filteredData,
            'order' => $order,
            'dataBuyer' => $dataBuyer
        ]);
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
