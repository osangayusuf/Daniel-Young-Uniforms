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
        @admin()
            <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                @method('POST')
                <button type="submit" class="max-lg:pl-10 px-2 border-blackish text-blackish font-bold block text-sm md:text-base">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="max-lg:pl-10 px-2 text-blackish font-bold self-center hidden lg:block">Login</a>

        @endadmin
    </div>

    <!-- NAV BAR -->
    <div class="flex flex-row w-full h-20 bg-dark-blue items-center rounded-b-2xl relative">
        <a href="{{ route('home') }}" class="basis-2/12 max-lg:basis-1/12">
            <img src="/images/nav-logo.png" alt="Logo" class="w-auto h-full max-w-16 lg:max-w-28 mx-auto">
        </a>

        <ul class="text-light-gray max-lg:space-x-3  space-x-7 basis-5/12 text-center max-lg:text-sm max-lg:mr-2 hidden lg:block">
            <li class="inline">
                <a href="{{ route('admin.home') }}" class="hover:text-light-orange">Home</a>
            </li>
            <li class="inline">
                <a href="{{ route('admin.pre-products') }}" class="hover:text-light-orange">Products</a>
            </li>
            <li class="inline">
                <a href="{{ route('admin.orders') }}" class="hover:text-light-orange">Orders</a>
            </li>
            <li class="inline">
                <a href="{{ route('admin.customers') }}" class="hover:text-light-orange">Customers</a>
            </li>
        </ul>
        <form action="{{ route('admin.products') }}" method="GET" class="basis-4/12 sm:basis-6/12 lg:basis-3/12 mx-auto">
            <div class="max-w-xl relative flex text-blackish items-center text-[8px] sm:text-base">
                <input type="text" name="search" id="search"
                       class="w-full border px-4 py-1 rounded-md focus:outline-none text-xs sm:text-base"
                       placeholder="Search">
                <button class="absolute right-4 max-md:right-2 w-5" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>

        @guest()
            <div class="basis-2/12 max-sm:ml-4 mr-[52px] sm:mr-16 flex flex-row lg:hidden">
                <a href="{{ route('login') }}" class="px-1 text-whiteish font-bold max-sm:text-xs">Login</a>
            </div>
        @endguest

        <button class="absolute right-5 lg:hidden text-whiteish text-xl z-10" id="nav-button">
            <i class="fa-solid fa-bars"></i>
            <ul class="absolute top-10 right-0 rounded-md shadow-xl bg-whiteish text-dark-gray py-4 text-sm text-left hidden" id="mobile-nav">
                <li>
                    <a href="{{ route('admin.home') }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish whitespace-nowrap">Home</a>
                </li>
                <li>
                    <a href="{{ route('admin.pre-products') }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish whitespace-nowrap">Products</a>
                </li>
                <li>
                    <a href="{{ route('admin.orders') }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish whitespace-nowrap">Orders</a>
                </li>
                <li>
                    <a href="{{ route('admin.customers') }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish whitespace-nowrap">Customers</a>
                </li>
            </ul>
        </button>
    </div>

    {{ $slot }}


    <x-admin-footer :categories="$categories"></x-admin-footer>

</div>
<x-flash-message/>
<script src="https://kit.fontawesome.com/fbce1fd5a0.js" crossorigin="anonymous"></script>
</body>
</html>


