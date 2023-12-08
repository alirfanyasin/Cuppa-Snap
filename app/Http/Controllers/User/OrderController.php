<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\TableNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::whereIn('status', ['Pending', 'Process', 'Done', 'Canceled', 'Rejected'])->orderBy('id', 'DESC')->get()->groupBy('code');

        $filterData = $data->map(function ($group) {
            return $group->first();
        });

        $filterData->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at);
            return $item;
        });


        return view('pages.app.orders', [
            'data' => $filterData
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
            'order_type' => 'required|in:Online,On-Site',
            'phone_number' => 'nullable|required_if:order_type,Online',
            'address' => 'nullable|required_if:order_type,Online',
            'payment_method' => 'required',
        ]);

        // Assuming you are using authentication, get the authenticated user
        $user = Auth::user();

        // Retrieve menu IDs and quantities from the request
        $menuIds = $request->input('menu_id');
        $quantities = $request->input('quantity');


        // Attach menu items to the order
        $commonCode = Str::random(8);
        foreach ($menuIds as $key => $menuId) {
            Order::create([
                'user_id' => $user->id,
                'order_type' => $request->input('order_type'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'payment_method' => $request->input('payment_method'),
                'table_id' => $request->input('table_number'),
                'status' => 'Pending',
                'code' => $commonCode,
                'menu_id' => $menuId,
                'quantity' => $quantities[$key],
            ]);
            // $orderItem->save();
        }

        $dataTabelNumber = TableNumber::where('number', $request->table_number)->first();
        if ($dataTabelNumber != null) {
            $dataTabelNumber->update(['status' => 'Full']);
        }

        Cart::where('user_id', $user->id)->delete();

        // Return a response or redirect as needed
        return redirect()->route('orders')->with('success', 'Order has been placed');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $code)
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
        return view('pages.app.orders_show_pelanggan', [
            'data' => $filteredData,
            'order' => $order,
            'dataBuyer' => $dataBuyer
        ]);
    }


    public function confirmed($code)
    {

        $orders = Order::where('code', $code)->get();

        // $orderOne = Order::where('code', $code)->first();

        // if($orderOne->status != 'Pending') {

        // }

        foreach ($orders as $order) {
            $order->update(['status' => 'Done']);
        }
        return redirect()->route('orders')->with('success', 'Confirmed orders successfully');
    }

    public function canceled($code)
    {
        $orders = Order::where('code', $code)->get();

        foreach ($orders as $order) {
            $order->update(['status' => 'Canceled']);
        }

        return redirect()->route('orders')->with('success', 'Rejected orders successfully');
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

        return redirect()->route('orders')->with('success', 'Deleted order successfully');
    }
}
