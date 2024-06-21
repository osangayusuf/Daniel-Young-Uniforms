<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-off-white font-poppins">
<!-- MAIN WRAPPER DIV -->
<div class="main-wrapper w-full">

    <!-- TOP BANNER -->
    <div class="top-banner bg-none flex flex-row h-16 max-md:h-10 pb-1 items-center">
        <div class="basis-2/12 hidden lg:block"></div>
        <p class="basis-8/12 text-center max-md:basis-full text-[9px] sm:text-base lg:text-xl">SETTING THE STANDARD WITH SUPERIOR QUALITY UNIFORMS</p>
        @guest()
            <a href="{{ route('login') }}" class="border-r-2 max-lg:pl-10 px-2 border-blackish text-blackish font-bold self-center hidden lg:block">Login</a>
            <a href="{{ route('register') }}" class="text-blackish font-bold self-center px-2 hidden lg:block">Register</a>
        @endguest
        @auth()
            <form action="{{ route('logout') }}" method="post">
                @csrf
                @method('POST')
                <button type="submit" class="max-lg:pl-10 px-2 border-blackish text-blackish font-bold block text-sm md:text-base">Logout</button>
            </form>
        @endauth
    </div>

    <!-- NAV BAR -->
    <div class="flex flex-row w-full h-20 bg-dark-blue items-center rounded-b-2xl relative">
        <a href="{{ route('home') }}" class="basis-2/12 max-lg:basis-1/12">
            <img src="/images/nav-logo.png" alt="Logo" class="w-auto h-full max-w-16 lg:max-w-28 mx-auto">
        </a>

        <ul class="text-light-gray max-lg:space-x-3  space-x-7 basis-5/12 text-center max-lg:text-sm max-lg:mr-2 hidden lg:block">
            <li class="inline">
                <a href="{{ route('home') }}" class="hover:text-light-orange">Home</a>
            </li>
            <li class="inline">
                <a href="{{ route('pre-shop') }}" class="hover:text-light-orange">Shop</a>
            </li>
            <li class="inline">
                <a href="{{ route('about') }}" class="hover:text-light-orange">About</a>
            </li>
            <li class="inline">
                <a href="{{ route('contact-messages.create') }}" class="hover:text-light-orange">Contact Us</a>
            </li>
        </ul>
        <form action="{{ route('shop') }}" method="GET" class="basis-4/12 sm:basis-6/12 lg:basis-3/12 mx-auto">
            <div class="max-w-xl relative flex text-blackish items-center text-[8px] sm:text-base">
                <input type="text" name="search" id="search"
                       class="w-full border px-4 py-1 rounded-md focus:outline-none text-xs sm:text-base"
                       placeholder="Search">
                <button class="absolute right-4 max-md:right-2 w-5" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
        @auth()
            <div class="basis-2/12 mr-12 gap-3 sm:gap-4 lg:gap-5 flex flex-row items-center place-content-center text-xl lg:text-2xl text-whiteish">
                <a href="{{ route('cart.index') }}" class="relative basis-1/5">
                    <div class="relative">
                        <i class="fa-solid fa-shopping-cart">
                            <span class="absolute right-0 -top-0.5 z-0 h-3 w-3 bg-red-600 rounded-full text-[10px] mx-auto flex place-content-center font-bold text-whiteish">
                                @if(auth()->user()->cart)
                                    {{ auth()->user()->cart->count() }}
                                @endif
                            </span>
                        </i>
                    </div>
                </a>
                <a href="{{ route('profile.edit') }}" class="relative basis-1/5 w-10">
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
        @endauth
        @guest()
            <div class="basis-2/12 max-sm:ml-4 mr-[52px] sm:mr-16 flex flex-row lg:hidden">
                <a href="{{ Route('login') }}" class="border-r-2 px-1 border-whiteish text-whiteish font-bold max-sm:text-xs">Login</a>
                <a href="{{ Route('register') }}" class="text-whiteish font-bold px-1 max-sm:text-xs whitespace-nowrap">Register</a>
            </div>
        @endguest

        <button class="absolute right-5 lg:hidden text-whiteish text-xl z-10" id="nav-button">
            <i class="fa-solid fa-bars"></i>
            <ul class="absolute top-10 right-0 rounded-md shadow-xl bg-whiteish text-dark-gray py-4 text-sm text-left hidden" id="mobile-nav">
                <li>
                    <a href="{{ route('home') }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish whitespace-nowrap">Home</a>
                </li>
                <li>
                    <a href="{{ route('pre-shop') }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish whitespace-nowrap">Shop</a>
                </li>
                <li>
                    <a href="{{ route('about') }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish whitespace-nowrap">About</a>
                </li>
                <li>
                    <a href="{{ route('contact-messages.create') }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish whitespace-nowrap">Contact Us</a>
                </li>
            </ul>
        </button>
    </div>

    {{ $slot }}

    @guest()
        <!-- BOTTOM BANNER SECTION -->
        <div class="flex flex-row bg-dark-blue py-6 px-5 sm:px-10 lg:px-20 tracking-tighter sm:tracking-normal text-whiteish items-center mt-60">
            <p class="text-xs sm:text-base md:text-xl lg:text-3xl basis-3/5">
                Sign up to receive updates on current deals and new arrivals
            </p>
            <a href="{{ route('register') }}" class="basis-2/5 flex place-content-end">
                <p class="text-xs sm:text-base whitespace-nowrap text-dark-blue bg-whiteish py-1 px-2 rounded-sm lg:py-2 lg:px-5 text-center lg:rounded-md">
                    SIGN UP FOR FREE
                </p>
            </a>
        </div>
    @else()
        <!-- BOTTOM BANNER SECTION -->
        <div class="flex flex-row bg-dark-blue py-6 px-5 sm:px-10 lg:px-20 tracking-tighter sm:tracking-normal text-whiteish items-center mt-60">
            <p class="text-xs sm:text-base md:text-xl lg:text-3xl basis-3/5">
                Visit our shop to see view our wide selection of uniforms
            </p>
            <a href="{{ route('pre-shop') }}" class="basis-2/5 flex place-content-end">
                <p class="text-xs sm:text-base whitespace-nowrap text-dark-blue bg-whiteish py-1 px-2 rounded-sm lg:py-2 lg:px-5 text-center lg:rounded-md">
                    VISIT SHOP
                </p>
            </a>
        </div>
    @endguest

    <x-footer :categories="$categories"></x-footer>

</div>
<x-flash-message/>
<script src="https://kit.fontawesome.com/fbce1fd5a0.js" crossorigin="anonymous"></script>
</body>
</html>

