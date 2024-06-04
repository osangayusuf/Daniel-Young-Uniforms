<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] h-auto mx-auto">
    <!-- SHOP SECTION -->
    <div class="w-11/12 mt-16 ml-4">
        <!-- TOP SECTION -->
        <div class="flex items-center gap-1 text-xs md:text-base">
            <a href="{{ route('home') }}" class="mr-3 hover:scale-125 transition-all">
                <i class="fa-solid fa-house text-dark-blue text-2xl"></i>
            </a>
            <i class="fa-solid fa-chevron-right"></i>
            <p class="ml-2">Cart</p>
        </div>

        <!-- CART SECTION -->
        <div class="w-full md:w-[90%] mx-auto mt-10">
            <div class="flex flex-row items-center text-dark-blue font-bold gap-5 text-xl md:text-2xl lg:text-3xl">
                <i class="fa-solid fa-shopping-cart"></i>
                <h1>Shopping Cart</h1>
            </div>
            <p class="text-dark-gray mt-3 text-xs md:text-base">
                Tick a particular item to add it to your checkout list
            </p>

            @unless(count($cart) == 0)
            <ul class="mt-12 lg:mt-20 w-full space-y-3 text-[8px] md:text-sm lg:text-base">
                @foreach($cart as $cart_item)
                <li class="flex flex-row items-center h-12 md:h-16 lg:h-20 w-full bg-white rounded-md shadow-md">
                    <input type="checkbox" name="" id="" class="basis-[0.5/12] ml-5 w-3 h-3 lg:w-4 lg:h-4">
                    <img src="{{ $cart_item->product->image1 }}" alt="" class="object-scale-down basis-2/12 h-3/4">
                    <div class="basis-4/12">
                        <p class="font-semibold">{{ $cart_item->product->name }}</p>
                        <p>{{ $cart_item->quantity }} pieces</p>
                    </div>
                    <p class="basis-1/12 font-bold text-center capitalize">{{ $cart_item->colour }}</p>
                    <a href="{{ route('cart.update', ['cart' => $cart_item]) }}" class="basis-3/12 text-dark-blue font-semibold hover:underline text-center">Edit Order</a>
                    <form action="{{ route('cart.delete', ['cart' => $cart_item]) }}" method="post" class="basis-1/12">
                        @csrf
                        @method('DELETE')
                        <button class="hover:text-red-500">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </form>
                </li>
                @endforeach

            </ul>

            <button class="bg-dark-blue text-white mx-auto text-xs md:text-base block mt-24 w-52 lg:w-96 py-3 rounded-md">Proceed to Checkout (2)</button>

            @else
                <h1 class="text-center text-dark-blue mt-20 lg:text-2xl font-bold">Cart is empty</h1>
                <p class="text-center text-dark-gray text-xs md:text-base mt-3">Products added to your cart will show here</p>
                <a href="{{ route('shop') }}" class="bg-dark-blue text-white mx-auto text-xs md:text-base block w-24 lg:w-52 mt-24 py-3 rounded-md text-center hover:bg-white hover:text-dark-blue outline outline-[0.5px] outline-dark-blue">Return to shop</a>
            @endunless


        </div>
    </div>
</div>

</x-app-layout>
