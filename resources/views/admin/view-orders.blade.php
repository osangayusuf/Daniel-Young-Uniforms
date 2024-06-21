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
                <p class="inline ml-2 self-center">Orders</p>
            </div>

            <!-- ORDERS TABLE SECTION -->
            <div class="w-full md:w-[90%] mx-auto mt-10 md:mt-28">
                <h1 class="text-dark-blue font-bold text-xl md:text-2xl lg:text-3xl">Orders</h1>
                <div class="bg-light-purple w-1/2 md:w-2/6 text-white p-3 pb-5 md:p-5 md:pb-10 space-y-4 md:space-y-7 mt-16 font-semibold">
                    <p class="md:text-xl">Pending Orders</p>
                    <p class="text-4xl md:text-5xl">{{ count(\App\Models\Order::where('status', 0)->get()) }}</p>
                </div>
                <form action="" method="GET" class="mx-auto mt-16">
                    <div class="relative flex text-[#92999B] items-center text-xs sm:text-base">
                        <input type="text" name="order_search" id="order_search"
                               class="w-full md:w-3/4 border-[1.5px] border-form-border pl-10 py-2 rounded-md text-xs lg:text-sm"
                               placeholder="Search for an Order">
                        <button class="absolute left-4 max-md:left-2 w-5" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>


                <div class="relative overflow-x-auto mt-10 lg:mt-24">
                    <table class="w-full text-[10px] md:text-sm text-left rtl:text-right text-profile-header">
                        <thead class="text-[8px] md:text-xs uppercase bg-dark-blue text-white">
                        <tr class="whitespace-nowrap">
                            <th scope="col" class="px-3 lg:px-6 py-2 lg:py-3">
                                Order ID
                            </th>
                            <th scope="col" class="px-3 lg:px-6 py-2 lg:py-3">
                                Name
                            </th>
                            <th scope="col" class="px-3 lg:px-6 py-2 lg:py-3">
                                Email Address
                            </th>
                            <th scope="col" class="px-3 lg:px-6 py-2 lg:py-3">
                                Status
                            </th>
                            <th scope="col" class="px-3 lg:px-6 py-2 lg:py-3">
                                View Order
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @unless(count($orders) == 0)
                            @foreach($orders as $order)

                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-3 lg:px-6 py-2 lg:py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ Str::padLeft($order->id, 4, '0') }}
                                    </th>
                                    <td class="px-3 lg:px-6 py-2 lg:py-4">
                                        {{ ucwords($order->user->firstname . " " . $order->user->lastname) }}
                                    </td>
                                    <td class="px-3 lg:px-6 py-2 lg:py-4">
                                        {{ $order->user->email }}
                                    </td>
                                    <td class="px-3 lg:px-6 py-2 lg:py-4 font-medium">
                                        @if($order->status == 0)
                                            <span class="text-red-500 ">Pending</span>
                                        @elseif($order->status == 1)
                                            <span class="text-green-500 ">Completed</span>
                                        @endif
                                    </td>
                                    <td class="px-3 lg:px-6 py-2 lg:py-4 text-[6px] md:text-xs whitespace-nowrap">
                                        <a href="{{ route('admin.order', [$order]) }}" class="text-dark-blue hover:underline">
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="bold mx-auto py-10">No order matching your search terms</td>
                            </tr>

                        @endunless
                        </tbody>
                    </table>

                    <div class="mt-28 flex gap-x-10">
                        <div class="basis-full">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

</x-admin-layout>
