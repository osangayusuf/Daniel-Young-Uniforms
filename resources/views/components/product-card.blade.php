@props(['product'])

<a href="{{ route('view-product', $product->id) }}">
    <div class="w-full h-3/4 object-cover object-center mx-auto aspect-[10/12]">
        <img src="{{ url('storage/' . $product->image1) }}" alt="product1" class="h-full w-full">
    </div>
    <p class="text-blackish text-[8px] text-center sm:text-sm font-semibold mt-3 px-1 md:px-4">{{ $product->name }}</p>
</a>
