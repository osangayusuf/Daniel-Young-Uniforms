@props(['product'])

<x-admin-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] mx-auto mb-52">

        <!-- PRODUCT SECTION WRAPPER -->
        <div class="w-11/12 mt-16 ml-4">

            <!-- TOP SECTION -->
            <div class="flex items-center text-xs md:text-sm">
                <a href="{{ route('admin.home') }}" class="mr-3 self-center hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-base md:text-xl"></i>
                </a>
                <i class="fa-solid fa-chevron-right"></i>
                <p class="ml-2">{{$product->name}}</p>
            </div>

            <!-- PRODUCT SECTION -->
            <div class="flex flex-col lg:flex-row gap-5 mt-10 font-semibold h-full">

                <!-- PRODUCT IMAGES -->
                <div class="w-3/5 lg:w-full lg:basis-[45%] grid md:grid-flow-row grid-cols-12 md:grid-cols-1 gap-6 md:gap-0 lg:flex-col lg:max-h-52 lg:sticky top-0 lg:mb-48 lg:pt-5">
                    <div class="col-span-8 lg:w-2/3 md:mx-auto w-full h-full aspect-square object-cover">
                        <img src="{{ url('storage/' . $product->image1) }}" alt="Product-1" class="w-full h-full">
                    </div>
                    <div class="col-span-3 grid grid-flow-row md:grid-flow-col md:grid-cols-3 md:mt-10 lg:w-2/3 md:mx-auto gap-6 lg:max-h-20">
                        <div class="w-full aspect-square object-cover max-lg:self-start">
                            <img src="{{ url('storage/' . $product->image2) }}" alt="additional product image" class="w-full h-full">
                        </div>
                        <div class="w-full aspect-square object-cover max-lg:self-center">
                            <img src="{{ url('storage/' . $product->image3) }}" alt="additional product image" class="w-full h-full">
                        </div>
                        <div class="w-full aspect-square object-cover max-lg:self-end">
                            <img src="{{ url('storage/' . $product->image4) }}" alt="additional product image" class="w-full h-full">
                        </div>
                    </div>
                </div>

                <!-- CUSTOMIZE ORDER SECTION -->
                <div class="basis-[45%] text-brown-2 pt-5 w-full">
                    <h1 class="text-blackish text-lg lg:text-3xl font-bold py-3">{{ $product->name }}</h1>
                    <p class="text-blackish font-semibold py-1 text-sm lg:text-base">Availability:
                        @if($product->availability)
                            <span class="text-light-green font-bold">In Stock</span>
                        @else
                            <span class="text-red-500 font-bold">Out of Stock</span>
                        @endif
                    </p>
                    <p class="text-blackish font-semibold py-1 text-sm lg:text-base">Category: <span class=" font-bold">{{ $product->category->name }}</span></p>
                    <p class="mt-12 font-medium text-sm lg:text-base">
                        {{ $product->description }}
                    </p>

                    <h2 class="text-dark-blue text-xl font-bold mt-10">Product Details</h2>

                    {{ $slot }}

                </div>

            </div>

        </div>
    </div>

</x-admin-layout>
