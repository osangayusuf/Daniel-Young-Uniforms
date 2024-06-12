@props(['product'])

<a href="{{ route('view-product') . "/" . $product->id }}">
    <div class="w-full h-3/4 object-cover object-center mx-auto aspect-square">
        <img src="{{ $product->image1 }}" alt="product1" class="h-full w-full">
    </div>
    <p class="text-blackish text-[8px] sm:text-sm font-semibold mt-3">{{ $product->name }}</p>
{{--    <p class="text-light-orange text-xs sm:text-base font-semibold">₦ {{ $product->price }}</p>--}}
</a>
