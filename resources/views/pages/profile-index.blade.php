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

            <div class="flex flex-row gap-20 mt-16">
                <x-profile-sidebar></x-profile-sidebar>
                <section class="w-4/5 lg:w-full mx-auto lg:basis-[45%] text-xs md:text-sm mt-5">

                    <div class="flex flex-row items-center lg:hidden mb-12 gap-4">
                        <i class="fa-solid fa-user text-2xl text-dark-blue"></i>
                        <h1 class="font-semibold text-profile-header">Profile</h1>
                    </div>
                    <!-- PROFILE FORM -->
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-7">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-2">
                            <label for="company">Company Name</label>
                            <input type="text" name="company" id="company" value="{{ $user->company }}" class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
                            @error('company')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname" value="{{ $user->firstname }}" class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
                            @error('firstname')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" value="{{ $user->lastname }}" class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
                            @error('lastname')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
                            @error('email')
                            <p class="text-red-500 italic">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="block w-full lg:h-12 pl-4 border-[1.5px] rounded-md border-form-border text-xs md:text-sm font-medium">
                            @error('phone')
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
