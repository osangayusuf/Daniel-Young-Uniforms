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
                <p class="inline ml-2 self-center">Shop</p>
            </div>
            <div>
                <!-- CATEGORIES SECTION -->
                <div class="w-[89%] max-md:w-[70%] mx-auto">
                    <h1 class="text-4xl max-md:text-2xl max-md:text-center font-bold my-20">Shop by Category</h1>
                    <div class="grid grid-cols-2 max-md:grid-cols-1 gap-3 text-whiteish font-semibold max-md:text-base text-lg">
                        @foreach($categories as $category)
                            <a href="{{ route('shop') . '?category=' . $category->id }}" class="relative block w-full">
                                <img src="{{ $category->image }}" alt="{{ $category->name }}" class="rounded-t-md w-full">
                                <p class="w-full bg-dark-blue py-2 text-center rounded-t-md absolute bottom-0">{{ $category->name }}</p>
                            </a>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>

    </div>

</x-app-layout>

