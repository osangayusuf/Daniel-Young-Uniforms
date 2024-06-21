<x-admin-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] mx-auto">

        <!-- PRODUCT SECTION WRAPPER -->
        <div class="w-11/12 mt-16 ml-4">

            <!-- TOP SECTION -->
            <div class="flex items-center text-xs md:text-sm">
                <a href="{{ route('admin.home') }}" class="mr-3 self-center hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-base md:text-xl"></i>
                </a>
                <i class="fa-solid fa-chevron-right"></i>
                <p class="ml-2">Edit Product</p>
            </div>
            <a href="{{ route('admin.view-product', $product) }}" class="mt-10 block font-semibold max-lg:text-sm space-x-3">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Go back</span>
            </a>
            <form action="{{ route('admin.edit-product', $product) }}" method="post" enctype="multipart/form-data" class="text-xs md:text-sm w-11/12 mx-auto md:mx-0 md:w-3/5 mb-52">
                @csrf
                @method('POST')
                <h1 class="text-dark-blue font-bold text-xl md:text-2xl lg:text-3xl my-5 md:mt-16">{{ $product->name }}</h1>
                <div class="space-y-2 py-3">
                    <label for="name" class="">Product Name</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}" class="block w-full relative h-10 p-2 rounded border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                    @error('name')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2 py-3">
                    <label for="sub_category">Sub-Category</label>
                    <select name="sub_category" id="sub_category" class="block text-[#384D55] font-light w-full py-2 rounded-md border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                        <option value="add_new_sub_category" >Add new sub-category</option>
                        @foreach($sub_categories as $sub)
                            <option value="{{$sub->sub_category}}" class="capitalize"
                            @if($sub->sub_category == $product->sub_category)
                                selected
                            @endif
                            >{{$sub->sub_category}}</option>
                        @endforeach
                    </select>
                    @error('sub_category')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                    <label for="add_new_sub_category" class="">Add new Sub-category</label>
                    <input type="text" name="add_new_sub_category" id="add_new_sub_category" placeholder="Add new sub-category" class="block w-full relative h-10 p-2 rounded border-[1.5px] border-form-border  text-[10px] md:text-[13px]">
                    @error('add_new_sub_category')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2 py-3">
                    <label for="classification" class="">Classification</label>
                    <input type="text" name="classification" id="classification" value="{{ $product->classification }}" placeholder="Classification(leave blank if none)" class="block w-full relative h-10 p-2 rounded border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                    @error('classification')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2 py-3">
                    <label for="description" class="">Product Description</label>
                    <textarea type="text" name="description" id="description" placeholder="Product description" class="block w-full relative h-[194px] p-2 rounded border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                        {{ $product->description }}
                    </textarea>
                    @error('description')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2 py-3">
                    <label for="availability" class="">Availability</label>
                    <select name="availability" id="availability" class="block text-[#384D55] font-light w-full py-2 rounded-md border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                        <option value="1">Available</option>
                        <option value="0"
                        @if(!$product->availability)
                            selected
                        @endif
                        >
                            Unavailable
                        </option>
                    </select>
                    @error('availability')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2 py-3">
                    <label for="sizes" class="">Available sizes(in CSV format)</label>
                    <input type="text" name="sizes" id="sizes" value="{{ $product->sizes }}" class="block w-full relative h-10 p-2 rounded border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                    @error('sizes')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2 py-3">
                    <label for="colours" class="">Available colours(in csv format)</label>
                    <input type="text" name="colours" id="colours" value="{{ $product->colours }}" class="block w-full relative h-10 p-2 rounded border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                    @error('colours')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2 py-3">
                    <label for="image1" class="">Main Product Image</label>
                    <input type="file" name="image1" id="image1" class="block w-full relative h-10 p-2 rounded border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                    @error('image1')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2 py-3">
                    <label for="image2" class="">Secondary Image 1</label>
                    <input type="file" name="image2" id="image2" class="block w-full relative h-10 p-2 rounded border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                    @error('image2')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2 py-3">
                    <label for="image3" class="">Secondary Image 2</label>
                    <input type="file" name="image3" id="image3" class="block w-full relative h-10 p-2 rounded border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                    @error('image3')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2 py-3">
                    <label for="image4" class="">Secondary Image 3</label>
                    <input type="file" name="image4" id="image4" class="block w-full relative h-10 p-2 rounded border-[1.5px] border-form-border text-[10px] md:text-[13px]">
                    @error('image4')
                    <p class="text-red-500 italic text-xs lg:text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <button type="submit" class="block bg-dark-blue text-white px-3 py-3 w-full lg:w-11/12 rounded-lg mt-20 hover:text-dark-blue hover:bg-white hover:outline hover:outline-[0.1px] outline-dark-blue">Save Changes</button>
            </form>
        </div>
    </div>
</x-admin-layout>
