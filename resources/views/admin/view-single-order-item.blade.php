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
                <p class="inline ml-2 self-center">Order {{ ' #' . Str::padLeft($order->id, 4, '0') }}</p>
            </div>
            <div class="w-[95%] mx-auto">
                <a href="{{ route('admin.orders') }}" class="block mt-10 text-xs md:text-base font-semibold">
                    <i class="fa-solid fa-arrow-left mr-1 md:mr-2"></i>
                    back
                </a>
                <h1 class="font-bold text-2xl md:text-5xl text-dark-blue mt-10">{{ Str::padLeft($order->id, 4, '0') }}</h1>
                <div class="text-[#2E2D2C] text-sm md:text-base font-medium mt-3 space-y-[0.3px]">
                    <p>{{ ucwords($order->user->firstname . " " . $order->user->lastname) }}</p>
                    <p>{{ $order->user->email }}</p>
                    <p>{{ $order->user->phone }}</p>
                </div>
                <!-- PRODUCT SECTION -->
                <div class="flex flex-col lg:flex-row gap-5 mt-10 font-semibold h-full">

                    <!-- PRODUCT IMAGES -->
                    <div class="w-3/5 lg:w-full lg:basis-[45%] grid md:grid-flow-row grid-cols-12 md:grid-cols-1 gap-6 md:gap-0 lg:flex-col lg:max-h-52 lg:sticky top-0 lg:mb-48 lg:pt-5">
                        <div class="col-span-8 lg:w-2/3 md:mx-auto w-full h-full aspect-square object-cover">
                            <img src="{{ url('storage/' . $order_item->product->image1) }}" alt="Product-1" class="w-full h-full">
                        </div>
                        <div class="col-span-3 grid grid-flow-row md:grid-flow-col md:grid-cols-3 md:mt-10 lg:w-2/3 md:mx-auto gap-6 lg:max-h-20">
                            <div class="w-full aspect-square object-cover max-lg:self-start">
                                <img src="{{ url('storage/' . $order_item->product->image2) }}" alt="additional product image" class="w-full h-full">
                            </div>
                            <div class="w-full aspect-square object-cover max-lg:self-center">
                                <img src="{{ url('storage/' . $order_item->product->image3) }}" alt="additional product image" class="w-full h-full">
                            </div>
                            <div class="w-full aspect-square object-cover max-lg:self-end">
                                <img src="{{ url('storage/' . $order_item->product->image4) }}" alt="additional product image" class="w-full h-full">
                            </div>
                        </div>
                    </div>

                    <!-- CUSTOMIZE ORDER SECTION -->
                    <div class="basis-[45%] pt-5 w-full space-y-3">
                        <h1 class="text-lg lg:text-3xl font-bold py-3">{{ $order_item->product->name }}</h1>
                        <p class="font-semibold text-sm lg:text-base">Colour: {{ $order_item->colour }}</p>
                        <p class="font-semibold text-sm lg:text-base">Quantity: {{ $order_item->quantity }}</p>
                        <p class="font-semibold text-sm lg:text-base">Size: {{ $order_item->size }}</p>
                        <p class="font-semibold text-sm lg:text-base">Further Info: {{ $order_item->further_info }}</p>
                        @if($order_item->custom_logo ?? false)
                            <h3 class="lg:text-lg bold pt-5">Custom Logo</h3>
                            <img src="{{ url('storage/' . $order_item->custom_logo) }}" alt="Custom logo" class="w-2/5 aspect-square object-contain">
                            <a href="{{ url('storage/' . $order_item->custom_logo) }}" download class="block bg-dark-blue text-white hover:bg-white hover:text-dark-blue text-center border border-dark-blue text-xs md:text-sm w-3/5 py-2 rounded-md">
                                Download custom logo
                            </a>
                        @endif

                    </div>

                </div>

            </div>



        </div>

    </div>

</x-admin-layout>

