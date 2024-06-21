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

            <form action="{{ route('order.checkout') }}" method="get">
                @unless(count($cart) == 0)
                <ul class="mt-12 lg:mt-20 w-full space-y-3 text-[8px] md:text-sm lg:text-base">
                @foreach($cart as $cart_item)

                    <li class="flex flex-row items-center h-12 md:h-16 lg:h-20 w-full bg-white rounded-md shadow-md">
                        <input type="checkbox" name="cart_items[]" id="" value="{{ $cart_item->id }}" class="basis-[0.5/12] ml-5 w-3 h-3 lg:w-4 lg:h-4">
                        <img src="{{ url('storage/' . $cart_item->product->image1) }}" alt="Product Image" class="object-scale-down basis-2/12 h-3/4">
                        <div class="basis-4/12">
                            <p class="font-semibold">{{ $cart_item->product->name }}</p>
                            <p>{{ $cart_item->quantity }} pieces</p>
                        </div>
                        <p class="basis-1/12 font-bold text-center capitalize">{{ $cart_item->colour }}</p>
                        <a href="{{ route('cart.update', ['cart' => $cart_item]) }}" class="basis-3/12 text-dark-blue font-semibold hover:underline text-center">Edit Order</a>
                        <button class="basis-1/12 block hover:text-red-500" type="button" id="show-dialog">
                            <i class="fa-solid fa-x"></i>
                        </button>
                        <div id="dialog" class="fixed top-0 left-0 w-full h-full text-black bg-white bg-opacity-50 z-10 pt-10 pb-20 hidden">
                            <div class="bg-white bg-opacity-100 w-4/5 lg:w-3/5 text-[9px] md:text-sm font-medium space-y-6 mx-auto p-12 lg:px-16 rounded-xl shadow-form-border shadow-md absolute flex flex-col gap-7 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <button id="close-dialog" type="button" class="block hover:text-red-800">
                                    <i class="fa-solid fa-x absolute right-12 lg:right-16 text-base lg:text-xl"></i>
                                </button>
                                <p class="text-center">Are you sure you want to delete {{ $cart_item->product->name }} from cart?</p>
                                <div class="grid grid-cols-2 place-items-center text-xs md:text-base gap-3">
                                    <a href="{{ route('cart.delete', ['cart' => $cart_item]) }}" class="bg-dark-blue text-white hover:bg-white hover:text-dark-blue text-center border border-dark-blue block w-24 lg:w-52 py-2 md:py-3 rounded-md">Yes</a>
                                    <button type="button" id="close-dialog" class="bg-white text-dark-blue hover:bg-dark-blue hover:text-white text-center border border-dark-blue block w-24 lg:w-52 py-2 md:py-3 rounded-md">No</button>
                                </div>
                            </div>
                        </div>
                    </li>

                    @endforeach

                </ul>

                <button class="bg-dark-blue text-white mx-auto text-xs md:text-base block mt-24 w-52 lg:w-96 py-3 rounded-md" type="submit">Place Order (<span id="cart-count">0</span>)</button>
        </form>
            @else
                <h1 class="text-center text-dark-blue mt-20 lg:text-2xl font-bold">Cart is empty</h1>
                <p class="text-center text-dark-gray text-xs md:text-base mt-3">Products added to your cart will show here</p>
                <a href="{{ route('shop') }}" class="bg-dark-blue text-white mx-auto text-xs md:text-base block w-24 lg:w-52 mt-24 py-3 rounded-md text-center hover:bg-white hover:text-dark-blue outline outline-[0.5px] outline-dark-blue">Return to shop</a>
            @endunless


        </div>
    </div>
</div>

</x-app-layout>
