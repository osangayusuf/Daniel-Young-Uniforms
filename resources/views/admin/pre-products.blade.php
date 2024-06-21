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
                <p class="inline ml-2 self-center">Products</p>
            </div>
            <div class="mt-32">
                <!-- LINKS SECTION -->
                <div class="w-[89%] max-md:w-[70%] mx-auto space-y-16">
                    <a href="{{ route('admin.add-product') }}" class="mx-auto w-full md:w-3/5 py-16 flex flex-col items-center justify-center gap-5 row-span-1 col-span-3 bg-light-purple text-white border-[1.5px] border-light-purple rounded-md">
                        <i class="fa-solid fa-circle-plus text-3xl"></i>
                        <p class="">Add New Product</p>
                    </a>
                    <a href="{{ route('admin.edit-products') }}" class="mx-auto w-full md:w-3/5 py-16 flex flex-col items-center justify-center gap-5 row-span-1 col-span-3 bg-white text-light-purple border-[1.5px] border-light-purple rounded-md">
                        <i class="fa-solid fa-pen text-3xl"></i>
                        <p class="">Edit Existing Product</p>
                    </a>

                </div>
            </div>

        </div>

    </div>

</x-admin-layout>

