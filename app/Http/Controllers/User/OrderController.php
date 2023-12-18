<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Rating;
use App\Models\TableNumber;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans\Snap;
use PSpell\Config;
use Illuminate\Support\Facades\DB;

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

        $isRating = Rating::all()->pluck('code');

        return view('pages.app.orders', [
            'data' => $filterData,
            'isRating' => $isRating
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
            'menu_id' => 'required|array',
            'quantity' => 'required|array',
        ]);

        $user = Auth::user();
        $commonCode = Str::random(8);

        $orderDetails = [];

        foreach ($request->input('menu_id') as $key => $menuId) {
            $orderDetails[] = [
                'user_id' => $user->id,
                'order_type' => $request->input('order_type'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'payment_method' => $request->input('payment_method'),
                'table_id' => $request->input('table_number'),
                'status' => 'Pending',
                'code' => $commonCode,
                'menu_id' => $menuId,
                'quantity' => $request->input('quantity')[$key],
            ];
        }

        // Calculate total price for each order and create orders
        $totalPrices = [];

        foreach ($orderDetails as $orderDetail) {
            $order = Order::create($orderDetail);
            $subtotal = $order->menu->price * $order->quantity;
            $totalPrices[] = $subtotal;
            Transaction::create($orderDetail);
        }

        // Calculate the overall total price
        $totalPrice = array_sum($totalPrices);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $params = [
            'transaction_details' => [
                'order_id' => $commonCode,
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        // Update snapToken for each order
        Order::where('code', $commonCode)->update(['snapToken' => $snapToken]);

        $dataTableNumber = TableNumber::where('number', $request->table_number)->first();

        if ($dataTableNumber) {
            $dataTableNumber->update(['status' => 'Full']);
        }

        // Clear the user's cart after placing the order
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('orders')->with([
            'success' => 'Order has been placed',
        ]);
    }




    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {
        $data = Order::whereIn('status', ['Pending', 'Process', 'Rejected', 'Done', 'Canceled'])
            ->orderBy('id', 'DESC')
            ->get()
            ->groupBy('code');

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
            'dataBuyer' => $dataBuyer,
            'snapToken' => $dataBuyer->snapToken
        ]);
    }



    public function confirmed($code)
    {


        Order::where('code', $code)->update(['status' => 'Done']);
        Transaction::where('code', $code)->update(['status' => 'Done']);


        // $orders = Order::where('code', $code)->get();

        // foreach ($orders as $order) {
        //     $order->update(['status' => 'Done']);
        // }
        return redirect()->route('orders')->with('success', 'Confirmed orders successfully');
    }




    public function canceled($code)
    {

        Order::where('code', $code)->update(['status' => 'Canceled']);
        Transaction::where('code', $code)->update(['status' => 'Canceled']);

        return redirect()->route('orders')->with('success', 'Canceled orders successfully');
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


    public function updateStatus($code)
    {
        $orders = Order::where('code', $code)->get();

        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No orders found for the given code'], 404);
        }

        foreach ($orders as $order) {
            $order->update(['status' => 'Process']);
        }

        return response()->json(['message' => 'Success']);
    }
}
