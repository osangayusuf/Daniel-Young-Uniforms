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
                <section class="w-full lg:basis-[74%] text-xs md:text-sm">

                    <div class="flex flex-row items-center lg:hidden my-10 gap-4">
                        <h1 class="font-semibold text-profile-header text-sm md:text-base">Order {{ '#' . Str::padleft($order->id, 4, '0') }}</h1>
                    </div>
                    <div class="bg-white rounded-xl pl-7 py-12">
                        <div class="flex flex-col md:flex-row gap-7 md:gap-20 mt-10 md:mt-20 text-sm md:text-base">
                            <div class="basis-1/3 grid gap-0.5">
                                <p>Order ID</p>
                                <p class="font-semibold text-2xl">{{ Str::padleft($order->id, 4, '0') }}</p>
                            </div>
                            <div class="basis-1/3 grid gap-0.5">
                                @if($order->status == 0)
                                    <p>Date Added</p>
                                    <p class="font-semibold text-xl">{{ $order->created_at->format('d/m/y') }}</p>
                                @elseif($order->status == 1)
                                    <p>Completed on</p>
                                    <p class="font-semibold text-xl">{{ $order->updated_at->format('d/m/y') }}</p>
                                @endif
                            </div>
                            <div class="basis-1/3 md:self-center">
                                <p class="font-semibold text-xl">
                                    @if($order->status == 0)
                                        <span class="text-red-500 ">Pending</span>
                                    @elseif($order->status == 1)
                                        <span class="text-green-500 ">Completed</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="md:ml-4 mr-2">
                            <h1 class="mt-20 font-semibold text-lg">Items</h1>
                            <ul class="mt-12 lg:mt-20 w-full space-y-3 text-[8px] md:text-sm">
                                @foreach($order->orderItems as $key=>$order_item)

                                    <li class="flex flex-row h-12 md:h-20 py-2 w-full items-center
                                @if($key != count($order->orderItems) - 1)
                                    border-b-2
                                @endif">
                                        <img src="{{ url('storage/' . $order_item->product->image1) }}" alt="" class="object-scale-down basis-2/12 h-full justify-self-start">
                                        <div class="basis-5/12">
                                            <p class="font-semibold">{{ $order_item->product->name }}</p>
                                            <p class="font-medium">{{ $order_item->size }}</p>
                                        </div>
                                        <p class="basis-2/12 font-bold capitalize">{{ $order_item->colour }}</p>
                                        <p class="basis-2/12 font-medium capitalize">{{ $order_item->quantity }} pieces</p>
                                    </li>

                                @endforeach

                            </ul>
                            <div class="mt-20 -space-y-0.5">
                                <p class="font-semibold pb-3">Shipping Address</p>
                                <p>{{ $order->shippingAddress->company }}</p>
                                <p>{{ $order->shippingAddress->address_line_1 . ' ' . $order->shippingAddress->address_line_2 }}</p>
                                <p>{{ $order->shippingAddress->city . ', ' . $order->shippingAddress->state }}</p>
                                <p>{{ $order->shippingAddress->postal_code }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('profile.orders') }}" class="block font-medium mt-12">
                        <i class="fa-solid fa-chevron-left mr-1 md:mr-2"></i>
                        Go back to Orders
                    </a>
                </section>

            </div>

        </div>

    </div>

</x-app-layout>
