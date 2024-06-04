<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] mx-auto">
        <!-- SHOP SECTION -->
        <div class="w-11/12 mt-16 ml-4">
            <!-- TOP SECTION -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="mr-3 self-center hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-2xl"></i>
                </a>
                <i class="fa-solid fa-chevron-right"></i>
                <p class="inline ml-2 self-center">Shop</p>
            </div>
            <div class="flex items-center gap-5 mt-4 lg:hidden relative">
                <i class="fa-solid fa-arrow-left"></i>
                <button id="shop-categories-button" class="text-dark-blue font-bold uppercase flex">
                    @if(Request::get('category') !== null)
                        {{ $categories[Request::get('category') - 1]->name }}
                    @else
                        All
                    @endif
                    <i class="fa-solid fa-sort-down pl-2 self-start"></i>
                </button>

                <ul id="shop-categories-menu" class="absolute top-6 left-7 rounded-md shadow-xl pt-10 pb-4 bg-whiteish hidden z-10 space-y-0.5">
                    <li>
                        <a href="{{ route('shop') }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish
                            @if(Request::fullUrl() == (route('shop')))
                                bg-dark-blue text-white
                            @endif">
                            All
                        </a>
                    </li>
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('shop') . '?category=' . $category->id }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish
                            @if((Request::fullUrl()) == ((route('shop') . '?category=' . $category->id)))
                                bg-dark-blue text-white
                            @endif">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="text-right flex justify-end relative items-center gap-2 max-lg:mt-5">
                <button id="shop-filter-button" class="">
                    Filter
                    <i class="fa-solid fa-filter"></i>
                </button>
                <ul id="shop-filter-menu" class="absolute top-6 right-0 rounded-md shadow-xl bg-whiteish text-left z-10 py-3 hidden min-w-44 space-y-0.5">
                    <li class="">
                        @if(isset($current_category))
                            <a href="{{ route('shop') . '?category=' . $current_category }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">All</a>
                        @else
                            <a href="{{ route('shop') }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">All</a>
                        @endif
                    </li>
                    @if(isset($sub_category))
                        @foreach($sub_category as $sub)
                            <li class="">
                                <a href="{{ route('shop') . '?category=' . $current_category . '&sub=' . $sub->sub_category }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">
                                    {{ $sub->sub_category }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="flex flex-row gap-4 mt-3">
                <x-shop-sidebar :categories='$categories'></x-shop-sidebar>
                <!-- ITEM SHOWCASE -->
                <section class="basis-full lg:basis-[72%] mx-5 lg:mx-10 mt-1">
                    @unless(count($products) == 0)
                    <div class="grid grid-cols-3 grid-rows-3 gap-x-3 gap-y-10 lg:gap-x-10 lg:gap-y-5">
                        <!-- PRODUCTS -->

                        @foreach($products as $product)
                            <x-product-card :product="$product"></x-product-card>
                        @endforeach
                    </div>
                    @else
                        <h1 class="font-bold lg:text-2xl text-center mt-32">Products not found. Try a different search term</h1>
                    @endunless

                </section>


            </div>
            <div class="mt-28 flex justify-end gap-x-10">
                <div class="basis-[60%]">
                    {{ $products->links() }}
                </div>
            </div>

        </div>

    </div>

</x-app-layout>
