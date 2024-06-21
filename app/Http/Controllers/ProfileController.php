<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ShippingAddressRequest;
use App\Models\Order;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use function PHPUnit\Framework\isNull;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        return view('pages.profile-index', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('message', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully');
    }

    public function myOrders(Request $request): View
    {
        return view('pages.my-orders', [
            'completed_orders' => Order::where('user_id', Auth::id())
                ->where('status', '1')
                ->orderByDesc('created_at')
                ->simplePaginate(3, '*', 'completed')
                ->withPath(route('profile.orders') . '?pending=' . $request->pending),
            'pending_orders' => Order::where('user_id', Auth::id())
                ->where('status', '0')
                ->orderByDesc('created_at')
                ->simplePaginate(3, '*', 'pending')
                ->withPath(route('profile.orders') . '?completed=' . $request->completed)
        ]);
    }

    public function viewSingleOrder(Order $order): View
    {
        return view('pages.view-single-order', ['order' => $order]);
    }

    public function viewAddress(): View
    {
        return view('pages.my-address', [
            'address' => auth()->user()->shippingAddress
        ]);
    }

    public function updateAddress(ShippingAddressRequest $request): RedirectResponse
    {
        $address = auth()->user()->shippingAddress;

        if($address == null) {
            $address = $request->validated();
            $address['user_id'] = Auth::id();
            ShippingAddress::create($address);
        } else {
            $address->update($request->validated());
        }


        return Redirect::back()->with('message', 'Address updated successfully.');
    }

    public function managePassword(Request $request): View
    {
        return view('pages.manage-password');
    }
}
