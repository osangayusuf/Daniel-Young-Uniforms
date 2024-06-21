<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        $user->loadCount('cart');
        return view('pages.cart', [
            'cart' => Cart::where('user_id', auth()->id())->with('product')->get(),
            'user' => $user,
        ]);
    }

    public function store(AddToCartRequest $request)
    {

        $formFields = $request->validated();

        if ($request->hasFile('custom_logo')) {
            $origExt = $request->file('custom_logo')->getClientOriginalExtension();
            $filename = 'custom_logo' . $formFields['product_id']. $formFields['colour'] . time() . '.' . $origExt;
            $logo = $request->file('custom_logo')->storeAs('images/custom-logo', strtolower($filename));
            $formFields['custom_logo'] = $logo;
        }

        Cart::create($formFields);

        $productName = Product::firstWhere('id', $formFields['product_id'])->name;

        return redirect()->back()->with('message', $productName . ' added to cart successfully.');

    }

    public function show(Cart $cart)
    {
        return $cart;
    }

    public function updateForm(Cart $cart) {

        return view('pages.product-customize',[
            'cart' => $cart,
            'similar' => Product::where('category_id', $cart->product->category_id)->where('sub_category', $cart->product->sub_category)->whereNot('id', $cart->product_id)->paginate(10)
        ]);
    }

    public function update(AddToCartRequest $request, Cart $cart)
    {
        $data = $request->validated();

        if ($request->hasFile('custom_logo') ?? false) {
            Storage::delete('custom-logo/' . $cart->custom_logo);
            $origExt = $request->file('custom_logo')->getClientOriginalExtension();
            $filename = 'custom_logo' . $data['product_id']. $data['colour'] . time() . '.' . $origExt;
            $logo = $request->file('custom_logo')->storeAs('images/custom-logo', strtolower($filename));
            $data['custom_logo'] = $logo;
        }

        $cart->update($data);

        return redirect('/cart')->with('message', 'Cart updated successfully');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return back()->with('message', $cart->product->name . " removed from cart successfully.");
    }
}
