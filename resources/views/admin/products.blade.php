<x-admin-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] mx-auto">
        <!-- SHOP SECTION -->
        <div class="w-11/12 mt-16 ml-4">
            <!-- TOP SECTION -->
            <div class="flex items-center text-xs md:text-sm">
                <a href="{{ route('admin.home') }}" class="mr-3 self-center hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-base md:text-xl"></i>
                </a>
                <i class="fa-solid fa-chevron-right"></i>
                <p class="inline mx-2 self-center">Products</p>

            </div>
            @if(!is_null($current_category))
                <h1 class="text-dark-blue text-center font-bold lg:hidden my-8 text-lg">{{ \App\Models\Category::whereId($current_category)->first()->name }}</h1>
            @endif

            {{--     MOBILE FILTER BAR     --}}
            <div class="flex lg:hidden mt-10 mb-16">
                <div class="flex items-center gap-5 relative basis-3/5">
                    <button id="shop-categories-button" class="text-dark-blue font-bold capitalize flex">
                        @if(Request::get('sub') !== null)
                            {{ Request::get('sub') }}
                        @else
                            All
                        @endif
                        <i class="fa-solid fa-sort-down pl-2 self-start"></i>
                    </button>

                    <ul id="shop-categories-menu" class="absolute top-6 left-1 rounded-md shadow-xl pt-10 pb-4 bg-whiteish hidden z-10 space-y-0.5 w-3/4">
                        <li>
                            <a href="{{ route('admin.products') . '?category=' . $current_category }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish
                                @if(Request::fullUrl() == ((route('admin.products') . '?category=' . $current_category)))
                                    bg-dark-blue text-white
                                @endif">
                                All
                            </a>
                        </li>
                        @if(!is_null($current_category))
                            @foreach($sub_categories as $sub)
                                <li>
                                    <a href="{{ route('admin.products') . '?category=' . $current_category . '&sub=' . $sub->sub_category }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish
                                    @if(Request::fullUrl() == ((route('admin.products') . '?category=' . $current_category. '&sub=' . $sub->sub_category)))
                                        bg-dark-blue text-white
                                    @endif">
                                        {{ $sub->sub_category }}
                                    </a>
                                </li>
                            @endforeach
                        @else
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('admin.products') . '?category=' . $category->id }}"  class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish
                                    @if(Request::fullUrl() == ((route('admin.products') . '?category=' . $category->id)))
                                        bg-dark-blue text-white
                                    @endif">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                @if(!is_null($current_category))
                    <div class="text-right flex justify-end relative items-center gap-2 basis-2/5">
                        <button id="shop-filter-button" class="">
                            Filter
                            <i class="fa-solid fa-filter"></i>
                        </button>
                        <ul id="shop-filter-menu" class="absolute top-6 right-0 rounded-md shadow-xl bg-whiteish text-left z-10 py-3 hidden min-w-44 space-y-0.5">
                            <li class="">
                                @if(isset($current_sub_category))
                                    <a href="{{ route('admin.products') . '?category=' . $current_category . '?sub=' . $current_sub_category }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">All</a>
                                @else
                                    <a href="{{ route('admin.products') . '?category=' . $current_category }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">All</a>
                                @endif
                            </li>
                            @if(isset($current_sub_category))
                                @foreach($sub_categories->where('sub_category', $current_sub_category)->first()->classification as $class)
                                    <li class="">
                                        <a href="{{ route('admin.products') . '?category=' . $current_category . '&sub=' . $current_sub_category . '&class=' . $class->classification }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">
                                            {{ $class->classification }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                @endif
            </div>

            <div class="flex flex-row gap-4 mt-3 lg:mt-16">
                <x-admin-products-sidebar :sub_categories='$sub_categories' :current_category='$current_category'></x-admin-products-sidebar>
                <!-- ITEM SHOWCASE -->
                <section class="basis-full lg:basis-[72%] mx-5 lg:mx-10 mt-1">
                    @unless(count($products) == 0)
                        <div class="grid grid-cols-3 gap-x-3 gap-y-10 lg:gap-x-10 lg:gap-y-5">
                            <!-- PRODUCTS -->

                            @foreach($products as $product)
                                <x-admin-product-card :product="$product"></x-admin-product-card>
                            @endforeach
                        </div>
                    @else
                        <h1 class="font-bold lg:text-2xl text-center mt-32">Products not found. Try a different search term</h1>
                    @endunless

                </section>


            </div>
            <div class="mt-28 flex gap-x-10">
                <div class="basis-full">
                    {{ $products->links() }}
                </div>
            </div>

        </div>

    </div>

</x-admin-layout>
