<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] mx-auto">
        <!-- SHOP SECTION -->
        <div class="w-11/12 mt-16 ml-4">
            <!-- TOP SECTION -->
            <div class="flex items-center text-xs md:text-sm">
                <a href="{{ route('home') }}" class="mr-3 self-center hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-base md:text-xl"></i>
                </a>
                <i class="fa-solid fa-chevron-right"></i>
                <p class="inline ml-2 self-center">Profile</p>
            </div>

            <div class="lg:hidden relative">
                <button id="profile-menu-button" class="flex flex-row items-center gap-3 ml-2 my-8">
                    <i class="fa-solid fa-user text-dark-blue text-2xl"></i>
                    <i class="fa-solid fa-sort-down text-dark-gray"></i>
                </button>
                <x-profile-menu></x-profile-menu>
            </div>

            <div class="flex flex-row gap-10 mt-16">
                <x-profile-sidebar></x-profile-sidebar>
                <section class="w-4/5 lg:w-full mx-auto lg:basis-[45%] text-xs md:text-sm mt-5">

                    <div class="flex flex-row items-center lg:hidden mb-12 gap-4">
                        <i class="fa-solid fa-location-dot text-2xl text-dark-blue"></i>
                        <h1 class="font-semibold text-profile-header">Shipping Address</h1>
                    </div>
                    <!-- PROFILE FORM -->
                    <form action="{{ route('profile.update-address') }}" method="POST" class="space-y-7">
                        @csrf
                        @method('POST')
                        <h1 class="text-dark-blue font-bold text-3xl">Shipping Address</h1>

                        <div class="space-y-2">
                            <label for="company">Company Name<span class="text-red-500 ml-1">*</span></label>
                            <input type="text" name="company" id="company"
                                   @if(isset($address->company))
                                       value="{{ $address->company }}"
                                   @endif
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
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
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
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
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
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
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
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
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
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
                                   class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
                            @error('postal_code')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="block w-full h-12 text-white bg-dark-blue hover:text-dark-blue hover:bg-white  hover:outline hover:outline-[0.1px] outline-dark-blue rounded-md mt-16">
                                Save
                            </button>
                        </div>
                    </form>
                </section>

            </div>

        </div>

    </div>

</x-app-layout>

