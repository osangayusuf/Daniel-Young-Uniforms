<x-product-page :product="$cart->product" :similar="$similar">

    <form action="" method="post" enctype="multipart/form-data" class="text-xs lg:text-base">
        @csrf
        @method('PUT')
        <div class="space-y-2 mt-8">
            <label for="Colour">Colour</label>
            <select name="colour" id="colour" class="block text-[#384D55] font-light w-full lg:w-96 py-2 rounded-md capitalize border-[1.5px] border-form-border">
                <option disabled>Select colour</option>
                @foreach(str_getcsv($cart->product->colours) as $colour)
                    <option value="{{$colour}}" class="capitalize" @if($colour == $cart->colour) selected @endif>{{$colour}}</option>
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
                <input type="number" name="quantity" id="quantity" value="{{ $cart->quantity }}" placeholder="1" class="w-1/2 lg:w-24 rounded flex items-center justify-center border-[1.5px] border-form-border">
                @error('quantity')
                <p class="text-red-500 italic text-xs lg:text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>
        <div class="space-y-2 mt-8">
            <label for="size">Size</label>
            <select name="size" id="size" class="block text-[#384D55] font-light w-full lg:w-96 py-2 rounded-md capitalize border-[1.5px] border-form-border">
                <option disabled>Select size</option>
                @foreach(str_getcsv($cart->product->sizes) as $size)
                    <option value="{{$size}}" class="capitalize" @if($size == $cart->size) selected @endif>{{$size}}</option>
                @endforeach
            </select>
            @error('size')
            <p class="text-red-500 italic text-xs lg:text-sm">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="space-y-2 py-10">
            <label for="further_info" class="">Please provide further information concerning
                <br>your customized order
            </label>
            <textarea type="text" name="further_info" id="further_info" placeholder="Enter Text" class="block w-full relative h-[194px] py-2 px-2 rounded border-[1.5px] border-form-border">
                {{ $cart->further_info }}
            </textarea>
            @error('further_info')
            <p class="text-red-500 italic text-xs lg:text-sm">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="">
            <p class="mb-5">If you would like to customize with your custom logo please upload a picture of it here</p>
            <label for="custom_logo" class="text-white text-2xl bg-dark-blue w-10 px-3 py-2">
                <i class="fa-solid fa-upload"></i>
            </label>
            <p class="inline ml-5 text-dark-gray" id="custom_logo_name"></p>
            <input type="file" name="custom_logo" id="custom_logo" value="{{ $cart->custom_logo  }}" hidden>
            @error('custom_logo')
            <p class="text-red-500 italic text-xs lg:text-sm mt-5">
                {{ $message }}
            </p>
            @enderror
        </div>
        <input type="text" name="product_id" id="product_id" value="{{ $cart->product_id }}" hidden class="hidden">
        <input type="text" name="user_id" id="user_id" value="{{ auth()->id() }}" hidden class="hidden">
        <button type="submit" class="bg-dark-blue text-whiteish px-3 py-3 w-full lg:w-11/12 rounded-lg mt-20 hover:text-dark-blue hover:bg-whiteish hover:outline hover:outline-[0.1px] outline-dark-blue">Edit Cart Item</button>
    </form>

</x-product-page>
