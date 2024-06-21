@props(['similar'])

<!-- SIMILAR ITEMS SECTION -->
<h1 class="lg:pl-20 mt-60 font-semibold text-2xl">SIMILAR ITEMS</h1>
<div class="container lg:mx-10 relative">
    <div class="flex flex-row mt-12 items-center gap-4 slider-wrapper">
    <button id="prev-slide" class="scale-50 md:scale-75 slide-button absolute top-1/2 z-[5] flex items-center justify-center -translate-y-1/2 left -translate-x-1/2">
        <img src="/images/backward-arrow-icon.svg" alt="backward arrow">
    </button>
    <div class="image-list grid grid-flow-row gris-cols text-whiteish font-bold gap-3 lg:gap-6 overflow-x-auto">
        @foreach($similar as $similar_item)
            <a href="{{ route('view-product', $similar_item) }}" class="block image-item w-24 lg:w-36 h-auto object-cover aspect-[10/12]">
                <img src="{{ url('storage/' . $similar_item->image1) }}" alt="" class="mx-auto h-full w-full rounded-t-md">
                <p class="w-full bg-dark-blue py-1 text-center rounded-b-md -translate-y-1/3 text-[8px] md:text-xs md:py-2">
                    {{ $similar_item->name }}
                </p>
            </a>
        @endforeach

    </div>
    <button id="next-slide" class="scale-50 md:scale-75 slide-button absolute top-1/2 z-[5] flex items-center justify-center -translate-y-1/2 right-0 translate-x-1/2">
        <img src="/images/forward-arrow-icon.svg" alt="forward arrow">
    </button>
</div>
</div>

