<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

//        dd(Auth::user()->usertype);

        if (Auth::user()->usertype == 'admin') {
            return redirect()->route('admin.home')->with('message', 'Login successful');
        } else {
            return redirect()->intended(route('home', absolute: false))->with('message', 'Login successful');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $usertype = Auth::user()->usertype;

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($usertype == 'admin') {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('home');
        }
    }
}
