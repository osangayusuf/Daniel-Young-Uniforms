<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] h-auto mx-auto">
        <!-- SHOP SECTION -->
        <div class="w-11/12 mt-16 ml-4">
            <!-- TOP SECTION -->
            <div class="flex items-center gap-1 text-xs md:text-base">
                <a href="#" class="mr-3 hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-2xl"></i>
                </a>
                <i class="fa-solid fa-chevron-right"></i>
                <p class="ml-2">Checkout</p>
            </div>

            <!-- CART SECTION -->
            <div class="w-full md:w-[90%] mx-auto mt-10">
                <div class="flex flex-row items-center text-dark-blue font-bold gap-5 text-xl md:text-2xl lg:text-3xl">
                    <i class="fa-solid fa-cash-register"></i>
                    <h1>Checkout</h1>
                </div>

                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="bg-white rounded-lg shadow-md mt-5 md:mt-10 p-5">
                        <ul class="w-full text-[8px] md:text-sm lg:text-base">
                            @foreach($order_items as $key => $item)
                                <li class="flex flex-row items-center h-12 md:h-16 lg:h-20 w-[95%] mx-auto gap-10
                                @if($key != (count($order_items) - 1))
                                    border-b-2
                                @endif">
                                    <img src="{{ url('storage/' . $item->product->image1) }}" alt="Product Image" class="object-scale-down aspect-square justify-self-start basis-[1.5/12] h-4/5">
                                    <p class="basis-5/12 font-semibold">{{ $item->product->name . '(' . $item->size . ')'}}</p>
                                    <p class="basis-3/12 font-semibold">{{ $item->colour }}</p>
                                    <p class="basis-2/12 font-medium">{{ $item->quantity }} pieces</p>
                                </li>
                                <input type="text" hidden="hidden" value="{{ $item->id }}" name="order_items[]" id=""/>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Shipping Addreass Form Section--}}
                    <div class="space-y-7 w-11/12 md:w-4/5 text-[10px] md:text-sm mt-24">
                        <h1 class="font-semibold text-base md:text-lg">Shipping Address</h1>
                        <div class="space-y-2">
                            <label for="company">Company Name<span class="text-red-500 ml-1">*</span></label>
                            <input type="text" name="company" id="company"
                                   @if(isset($address->company))
                                       value="{{ $address->company }}"
                                   @endif
                                   class="block w-full h-8 md:h-10 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
                            @error('company')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="address_line_1">Address (Line 1)<span class="text-red-500 ml-1">*</span></label>
                            <input type="text" name="address_line_1" id="address_line_1"
                                   @if(isset($address->address_line_1))
                                       value="{{ $address->address_line_1 }}"
                                   @endif
                                   class="block w-full h-8 md:h-10 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
                            @error('address_line_1')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="address_line_2">Address (Line 2)</label>
                            <input type="text" name="address_line_2" id="address_line_2"
                                   @if(isset($address->address_line_2))
                                       value="{{ $address->address_line_2 }}"
                                   @endif
                                   class="block w-full h-8 md:h-10 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
                            @error('address_line_2')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="city">City<span class="text-red-500 ml-1">*</span></label>
                            <input type="text" name="city" id="city"
                                   @if(isset($address->city))
                                       value="{{ $address->city }}"
                                   @endif
                                   class="block w-full h-8 md:h-10 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
                            @error('city')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="state">State<span class="text-red-500 ml-1">*</span></label>
                            <input type="text" name="state" id="state"
                                   @if(isset($address->state))
                                       value="{{ $address->state }}"
                                   @endif
                                   class="block w-full h-8 md:h-10 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
                            @error('state')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="postal_code">Postal Code<span class="text-red-500 ml-1">*</span></label>
                            <input type="text" name="postal_code" id="postal_code"
                                   @if(isset($address->postal_code))
                                       value="{{ $address->postal_code }}"
                                   @endif
                                   class="block w-full h-8 md:h-10 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
                            @error('postal_code')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="relative pt-12 text-xs md:text-sm grid grid-cols-2 items-center">
                            <a href="{{ route('pre-shop') }}" class="flex flex-row items-center gap-2 font-bold hover:underline">
                                <i class="fa-solid fa-chevron-left"></i>
                                <p>Continue Shopping</p>
                            </a>
                            <button type="submit" class="block text-center text-white bg-dark-blue rounded-md w-4/5 py-3 justify-self-end hover:bg-white hover:text-dark-blue outline outline-[0.5px] outline-dark-blue">
                                Place Order
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
