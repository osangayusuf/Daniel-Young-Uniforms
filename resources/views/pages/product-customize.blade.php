<x-product-page :product="$cart->product" :similar="$similar">

    <form action="" method="post" enctype="multipart/form-data" class="text-xs lg:text-base">
        @csrf
        @method('PUT')
        <div class="space-y-2 mt-8">
            <label for="Colour">Colour</label>
            <select name="colour" id="colour" class="block text-[#384D55] font-light w-full lg:w-96 py-2 rounded-md capitalize">
                <option disabled selected>Select colour</option>
                @foreach(str_getcsv($cart->product->colours) as $colour)
                    <option value="{{$colour}}" class="capitalize">{{$colour}}</option>
                @endforeach
            </select>
            @error('colour')
            <p class="text-red-500 italic text-xs lg:text-sm">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="pt-8 space-y-2">
            <div class="flex flex-col gap-2">
                <label for="quantity" class="font-bold">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ $cart->quantity }}" placeholder="1" class="border border-dark-gray w-1/2 lg:w-24 rounded-sm flex items-center justify-center">
                @error('quantity')
                <p class="text-red-500 italic text-xs lg:text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>
        <div class="space-y-2 mt-8">
            <label for="chest_size">Chest Size (in cm)</label>
            <input type="text" name="chest_size" id="chest_size" placeholder="48" value="{{ $cart->chest_size }}" class="block w-full lg:w-96 h-10 pl-3 border border-light-gray rounded">
            @error('chest_size')
            <p class="text-red-500 italic text-xs lg:text-sm">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="space-y-2 mt-8">
            <label for="arm_length">Arm Length (in cm)</label>
            <input type="text" name="arm_length" id="arm_length" placeholder="60" value="{{ $cart->arm_length }}" class="block w-full lg:w-96 h-10 pl-3 border border-light-gray rounded">
            @error('arm_length')
            <p class="text-red-500 italic text-xs lg:text-sm">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="space-y-2 mt-8">
            <label for="neck_size">Neck Size (in cm)</label>
            <input type="text" name="neck_size" id="neck_size" placeholder="48" value="{{ $cart->neck_size }}" class="block w-full lg:w-96 h-10 pl-3 border border-light-gray rounded">
            @error('neck_size')
            <p class="text-red-500 italic text-xs lg:text-sm">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="space-y-2 mt-8">
            <label for="waist_size">Waist Size (in cm)</label>
            <input type="text" name="waist_size" id="waist_size" placeholder="60" value="{{ $cart->waist_size }}" class="block w-full lg:w-96 h-10 pl-3 border border-light-gray rounded">
            @error('waist_size')
            <p class="text-red-500 italic text-xs lg:text-sm">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="py-10">
            <p class="md:pr-48 mb-5">If you would like to customize with your custom logo please upload a picture of it here</p>
            <label for="custom_logo" class="text-white text-2xl bg-dark-blue w-10 px-3 py-2">
                <i class="fa-solid fa-upload"></i>
            </label>
            <p class="inline ml-5" id="custom_logo_name">{{ $cart->custom_logo }}</p>
            <input hidden type="file" name="custom_logo" id="custom_logo" value="{{ $cart->custom_logo }}">
            @error('custom_logo')
            <p class="text-red-500 italic text-xs lg:text-sm mt-5">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="space-y-2">
            <label for="further_info" class="">Please provide further information concerning
                <br>your customized order
            </label>
            <textarea type="text" name="further_info" id="further_info" placeholder="Enter Text" class="block w-full relative h-[194px] py-2 px-2 rounded">{{ $cart->further_info }}</textarea>
            @error('further_info')
            <p class="text-red-500 italic text-xs lg:text-sm">
                {{ $message }}
            </p>
            @enderror
        </div>
        <input type="text" name="product_id" id="product_id" value="{{ $cart->product_id }}" hidden class="hidden">
        <input type="text" name="user_id" id="user_id" value="{{ auth()->id() }}" hidden class="hidden">
        <button type="submit" class="bg-dark-blue text-whiteish px-3 py-3 w-full lg:w-[552px] rounded-lg mt-20 lg:ml-6">Edit Order</button>
    </form>

</x-product-page>
