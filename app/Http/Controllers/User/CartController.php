<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\TableNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->forget('cart_count');
        return view('pages.app.carts', [
            'data' => Cart::where('user_id', Auth::user()->id)->get(),
            'total' => $this->calculateTotal(),
            'dataTable' => TableNumber::where('status', 'Empty')->get()
        ]);
    }


    public function getModal()
    {
        $dataModal = Cart::where('user_id', Auth::user()->id)->get();
        return view('pages.app.modal_cart')->with([
            'data' => $dataModal,
            'dataTable' => TableNumber::where('status', 'Empty')->get()
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
        Cart::create($request->all());
        $cartCount = session('cart_count', 0) + 1;
        session(['cart_count' => $cartCount]);
        return redirect()->route('menu')->with('success', 'Add to cart successfully');
    }


    public function updateQuantity($itemId, Request $request)
    {
        $cartItem = Cart::find($itemId);
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        $total = $this->calculateTotal();
        return response()->json(['total' => $total]);
    }


    private function calculateTotal()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();

        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->menu->price * $item->quantity;
        }

        return $total;
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
        $data = Cart::findOrFail($id);
        $data->delete();
        return redirect()->route('carts')->with('success', 'Deleted item successfully');
    }
}
