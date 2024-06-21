<x-app-layout>
    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] h-auto mx-auto">
        <!-- SHOP SECTION -->
        <div class="w-11/12 mt-16 ml-4">
            <!-- TOP SECTION -->
            <div class="flex items-center text-xs md:text-sm">
                <a href="{{ route('home') }}" class="mr-3 self-center hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-base md:text-xl"></i>
                </a>
            </div>

            <!-- CART SECTION -->
            <div class="w-full md:w-[90%] mx-auto mt-10">
                <div class="flex flex-row items-center text-dark-blue font-bold gap-5 text-xl md:text-2xl lg:text-3xl">
                    <i class="fa-solid fa-location-dot"></i>
                    <h1>Delivery Address</h1>
                </div>
                <p class="text-[#282727] text-[8px] md:text-sm mt-3">Please confirm the address that your items would be delivered to.</p>

                <!-- PROFILE FORM -->
                <form action="{{ route('profile.update-address') }}" method="POST" class="space-y-7 w-full md:w-4/5 text-[10px] md:text-sm mt-5">
                        @csrf
                        @method('POST')
                        <div class="space-y-2">
                            <label for="company">Company Name<span class="text-red-500 ml-1">*</span></label>
                            <input type="text" name="company" id="company"
                                   @if(isset($address->company))
                                       value="{{ $address->company }}"
                                   @endif
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
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
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
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
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
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
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
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
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
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
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-[10px] md:text-sm font-medium">
                            @error('postal_code')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="block w-full md:w-2/5 mx-auto h-12 text-white bg-dark-blue hover:text-dark-blue hover:bg-white hover:outline hover:outline-[0.1px] outline-dark-blue rounded-md mt-16">
                                Save and place order
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
