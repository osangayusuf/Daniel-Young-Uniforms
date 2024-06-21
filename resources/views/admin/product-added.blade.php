<x-admin-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] h-auto mx-auto">
        <!-- SHOP SECTION -->
        <div class="w-11/12 mt-16 ml-4">

            <!-- TOP SECTION -->
            <div class="flex items-center text-xs md:text-sm">
                <a href="{{ route('admin.home') }}" class="mr-3 self-center hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-base md:text-xl"></i>
                </a>
            </div>

            <div class="bg-white w-11/12 md:w-4/5 mx-auto mt-24 p-8 pb-5 lg:pb-8 lg:p-16 rounded-md shadow-black">
                <h1 class="font-semibold text-dark-blue md:text-2xl">New product has been added</h1>
                <p class="mt-5 text-xs md:text-base">The new product has been added to the system</p>
                <div class="flex mt-16 text-[9px] md:text-base">
                    <a href="{{ route('admin.products') }}" class="block text-dark-blue font-bold justify-self-start hover:underline"><i class="fa-solid fa-chevron-left mr-1 md:mr-2"></i>  View all products</a>
                </div>

            </div>
        </div>
    </div>

</x-admin-layout>
