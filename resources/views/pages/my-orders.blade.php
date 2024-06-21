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

                    <div class="flex flex-row items-center lg:hidden mb-12 gap-4">
                        <i class="fa-solid fa-bag-shopping text-2xl text-dark-blue"></i>
                        <h1 class="font-semibold text-profile-header">My Orders</h1>
                    </div>

                    <div>
                        <h1 class="text-dark-blue font-bold text-3xl">Pending Orders</h1>
                        @unless(count($pending_orders) == 0)
                            <ul class="mt-12 lg:mt-20 w-full space-y-3 text-[10px] md:text-sm lg:text-base">
                                @foreach($pending_orders as $order)

                                    <li class="flex flex-row items-center w-full bg-white rounded-lg shadow p-5 pb-3 gap-2">
                                        <div class="basis-3/12 grid gap-2 md:gap-3">
                                            <p>Order ID</p>
                                            <p class="font-semibold">{{ Str::padleft($order->id, 4, "0") }}</p>
                                        </div>
                                        <div class="basis-3/12 grid gap-2 md:gap-3">
                                            <p>Date Added</p>
                                            <p class="font-semibold">{{ $order->created_at->format('d/m/y') }}</p>
                                        </div>
                                        <div class="basis-2/12 grid gap-2 md:gap-3">
                                            <p>Items</p>
                                            <p class="font-semibold">{{ count($order->orderItems) }}</p>
                                        </div>
                                        <div>
                                            <a href="{{ route('profile.order', ['order' => $order]) }}" class="block text-dark-blue hover:underline font-medium">View Order</a>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                            <div class="mt-12 flex gap-x-10">
                            <div class="basis-full">
                                {{ $pending_orders->links() }}
                            </div>
                        </div>
                        @else
                            <h1 class="font-semibold md:text-xl my-12 ml-4">You have no pending orders</h1>
                        @endunless
                    </div>


                    <div>
                        <h1 class="text-dark-blue font-bold text-3xl mt-20">Completed Orders</h1>
                        @unless(count($completed_orders) == 0)
                            <ul class="mt-12 lg:mt-20 w-full space-y-3 text-[10px] md:text-sm lg:text-base">
                                @foreach($completed_orders as $order)

                                    <li class="flex flex-row items-center w-full bg-white rounded-lg shadow p-5 pb-3 gap-2">
                                        <div class="basis-3/12 grid gap-2 md:gap-3">
                                            <p>Order ID</p>
                                            <p class="font-semibold">{{ Str::padleft($order->id, 4, "0") }}</p>
                                        </div>
                                        <div class="basis-3/12 grid gap-2 md:gap-3">
                                            <p>Completed on</p>
                                            <p class="font-semibold">{{ $order->updated_at->format('d/m/y') }}</p>
                                        </div>
                                        <div class="basis-2/12 grid gap-2 md:gap-3">
                                            <p>Items</p>
                                            <p class="font-semibold">{{ count($order->orderItems) }}</p>
                                        </div>
                                        <div>
                                            <a href="{{ route('profile.order', ['order' => $order]) }}" class="block text-dark-blue hover:underline font-medium">View Order</a>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                            <div class="mt-12 flex gap-x-10">
                            <div class="basis-full">
                                {{ $completed_orders->links() }}
                            </div>
                        </div>
                        @else
                            <h1 class="font-semibold md:text-xl my-12 ml-4">You have no completed orders</h1>
                        @endunless
                    </div>


                </section>

            </div>

        </div>

    </div>

</x-app-layout>
