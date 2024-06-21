<x-admin-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] mx-auto">
        <!-- SHOP SECTION -->
        <div class="w-11/12 mt-16 ml-4">
            <!-- TOP SECTION -->
            <div class="flex items-center">
                <a href="{{ route('admin.home') }}" class="mr-3 self-center hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-2xl"></i>
                </a>
                <i class="fa-solid fa-chevron-right"></i>
                <p class="inline ml-2 self-center">Customers</p>
            </div>

            <!-- CUSTOMERS TABLE SECTION -->
            <div class="w-full md:w-[90%] mx-auto mt-10 md:mt-28">
                <h1 class="text-dark-blue font-bold text-xl md:text-2xl lg:text-3xl">Customers</h1>
                <form action="" method="GET" class="mx-auto mt-8">
                    <div class="relative flex text-[#92999B] items-center text-xs sm:text-base">
                        <input type="text" name="user_search" id="user_search"
                               class="w-full md:w-3/4 border-[1.5px] border-form-border pl-10 py-2 rounded-md text-xs lg:text-sm"
                               placeholder="Search for a Customer">
                        <button class="absolute left-4 max-md:left-2 w-5" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>


                <div class="relative overflow-x-auto mt-20 lg:mt-32">
                    <table class="w-full text-[10px] md:text-sm text-left rtl:text-right text-profile-header">
                        <thead class="text-[8px] md:text-xs uppercase bg-dark-blue text-white">
                        <tr>
                            <th scope="col" class="px-3 lg:px-6 py-2 lg:py-3">
                                Name
                            </th>
                            <th scope="col" class="px-3 lg:px-6 py-2 lg:py-3">
                                Email Address
                            </th>
                            <th scope="col" class="px-3 lg:px-6 py-2 lg:py-3">
                                Phone
                            </th>
                            <th scope="col" class="px-3 lg:px-6 py-2 lg:py-3">
                                Company Name
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @unless(count($customers) == 0)
                            @foreach($customers as $customer)

                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-3 lg:px-6 py-2 lg:py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ ucwords($customer->firstname . " " . $customer->lastname) }}
                                    </th>
                                    <td class="px-3 lg:px-6 py-2 lg:py-4">
                                        {{ $customer->email }}
                                    </td>
                                    <td class="px-3 lg:px-6 py-2 lg:py-4">
                                        {{ $customer->phone }}
                                    </td>
                                    <td class="px-3 lg:px-6 py-2 lg:py-4">
                                        {{ $customer->company }}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="bold mx-auto py-10">No customer matching your search terms</td>
                            </tr>

                        @endunless
                        </tbody>
                    </table>

                    <div class="mt-28 flex gap-x-10">
                        <div class="basis-full">
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>

</x-admin-layout>
