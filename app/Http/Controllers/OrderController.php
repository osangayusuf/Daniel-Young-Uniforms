<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingAddressRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{

    public function create(Request $request)
    {
        $order_items = array();

        if ($request->has('cart_items')) {
            $cart_items = $request->get('cart_items');

            foreach ($cart_items as $cart_item) {

                $item = Cart::whereId($cart_item)->first();

                $order_items[] = $item;
            }

        } else {
            return back()->with('message', 'You must select at least one item to proceed to checkout');
        }
        return view('pages.checkout', [
            'order_items' => $order_items,
            'address' => auth()->user()->shippingAddress,
        ]);
    }
    public function store(ShippingAddressRequest $request)
    {
        $address = auth()->user()->shippingAddress;

        if($address == null) {
            $address = $request->validated();
            $address['user_id'] = Auth::id();
            $address = ShippingAddress::create($address);
        } else {
            $address->update($request->validated());
        }

        $data = [
            'user_id' => auth()->user()->id,
            'status' => 0,
            'shipping_address_id' => $address->id,
        ];

        $order = Order::create($data);

        $order_items = $request->get('order_items');


        foreach ($order_items as $order_item) {

            $item = Cart::whereId($order_item)->first();


            $order_item = new OrderItem([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'colour' => $item['colour'],
                'size' => $item['size'],
                'quantity' => $item['quantity'],
                'custom_logo' => $item['custom_logo'],
                'further_info' => $item['further_info'],
            ]);

            $order_item->save();

            $item->delete();
        }




        return  redirect()->route('order.placed');


    }

    public function orderPlaced(): View
    {
        return view('pages.placed-order');
    }

    public function setAddress(): View
    {
        return view('pages.set-order-address', [
            'address' => auth()->user()->shippingAddress
        ]);
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users'],
            'status' => ['required', 'integer'],
        ]);

        $order->update($data);

        return $order;
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json();
    }
}
