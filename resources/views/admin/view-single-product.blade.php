<x-admin-product-page :product="$product">

    <div class="text-xs lg:text-base">
        @csrf
        @method('POST')
        <div class="space-y-2 mt-8">
            <div class="space-y-1">
                <h1 class="font-bold">Available Colours</h1>
                <p class="lg:text-sm">{{$product->colours}}</p>
            </div>
        </div>
        <div class="pt-8 space-y-2">
            <div class="space-y-1">
                <h1 class="font-bold">Available Sizes</h1>
                <p class="lg:text-sm">{{$product->sizes}}</p>
            </div>
        </div>
        <div class="mt-20 space-y-5">
            <a href="{{ route('admin.edit-product', $product) }}" class="block bg-dark-blue text-white text-center px-3 py-3 w-full lg:w-11/12 rounded-lg hover:text-dark-blue hover:bg-white border border-dark-blue">Edit Product</a>
            <button type="button" id="show-dialog" class="block bg-white text-dark-blue text-center px-3 py-3 w-full lg:w-11/12 rounded-lg hover:text-white hover:bg-dark-blue border border-dark-blue">Delete Product</button>
            <div id="dialog" class="fixed top-0 left-0 w-full h-full text-black bg-white bg-opacity-50 z-10 pt-10 pb-20 hidden">
                <div class="bg-white bg-opacity-100 w-4/5 lg:w-3/5 text-[9px] md:text-sm font-medium space-y-6 mx-auto p-12 lg:px-16 rounded-xl shadow-form-border shadow-md absolute flex flex-col gap-7 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <button id="close-dialog" type="button" class="block hover:text-red-800">
                        <i class="fa-solid fa-x absolute right-12 lg:right-16 text-base lg:text-xl"></i>
                    </button>
                    <p class="text-center">Are you sure you want to delete {{ $product->name }}?</p>
                    <div class="grid grid-cols-2 place-items-center text-xs md:text-base gap-3">
                        <a href="{{ route('admin.delete-product', $product) }}" class="bg-dark-blue text-white hover:bg-white hover:text-dark-blue text-center border border-dark-blue block w-24 lg:w-52 py-2 md:py-3 rounded-md">Yes</a>
                        <button type="button" id="close-dialog" class="bg-white text-dark-blue hover:bg-dark-blue hover:text-white text-center border border-dark-blue block w-24 lg:w-52 py-2 md:py-3 rounded-md">No</button>
                    </div>
                </div>
            </div>
        </div>
  </div>

</x-admin-product-page>


