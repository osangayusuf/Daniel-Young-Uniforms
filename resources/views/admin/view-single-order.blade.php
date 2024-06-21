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

                <ul class="mt-12 lg:mt-20 w-full space-y-3 text-[8px] md:text-sm lg:text-base">
                    @foreach($order_items as $order_item)

                        <li class="flex flex-row items-center h-12 md:h-20 lg:h-20 w-full bg-white rounded-sm shadow">
                            <img src="{{ url('storage/' . $order_item->product->image1) }}" alt="" class="object-scale-down basis-3/12 h-3/4">
                            <div class="basis-4/12">
                                <p class="font-semibold">{{ $order_item->product->name }}</p>
                                <p>{{ $order_item->quantity }} pieces</p>
                            </div>
                            <p class="basis-2/12 font-bold capitalize">{{ $order_item->colour }}</p>
                            <a href="{{ route('admin.view-order-item', [$order, $order_item]) }}" class="basis-3/12 text-dark-blue font-semibold hover:underline">View Details</a>
                        </li>

                    @endforeach

                </ul>
                @if($order->status == 0)
                    <button id="show-dialog" class="block bg-dark-blue text-white text-[10px] md:text-sm lg:text-base px-5 py-3 w-1/2 md:w-2/5 rounded-lg my-20 mx-auto hover:text-dark-blue hover:bg-whiteish hover:outline hover:outline-[0.1px] outline-dark-blue">
                        Mark as Completed
                    </button>
                @else
                    <button id="show-dialog" disabled class="block bg-dark-gray text-white text-[10px] md:text-sm lg:text-base px-5 py-3 w-1/2 md:w-2/5 rounded-lg my-20 mx-auto">
                        Completed
                    </button>
                @endif
                <div id="dialog" class="fixed top-0 left-0 w-full h-full text-black bg-white bg-opacity-50 z-10 pt-10 pb-20 hidden">
                    <div class="bg-white bg-opacity-100 w-4/5 lg:w-3/5 text-[9px] md:text-sm font-medium space-y-6 mx-auto p-12 lg:px-16 rounded-xl shadow-form-border shadow-md absolute flex flex-col gap-7 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <button id="close-dialog" type="button" class="block hover:text-red-800">
                            <i class="fa-solid fa-x absolute right-12 lg:right-16 text-base lg:text-xl"></i>
                        </button>
                        <p class="text-center">Are you sure you want to mark order {{ Str::padLeft($order->id, 4, '0') }} as complete?</p>
                        <div class="grid grid-cols-2 place-items-center text-xs md:text-base gap-3">
                            <a href="{{ route('admin.order.complete', ['order' => $order]) }}" class="bg-dark-blue text-white hover:bg-white hover:text-dark-blue text-center border border-dark-blue block w-24 lg:w-52 py-2 md:py-3 rounded-md">Yes</a>
                            <button type="button" id="close-dialog" class="bg-white text-dark-blue hover:bg-dark-blue hover:text-white text-center border border-dark-blue block w-24 lg:w-52 py-2 md:py-3 rounded-md">No</button>
                        </div>
                    </div>
                </div>


            </div>



        </div>

    </div>

</x-admin-layout>
