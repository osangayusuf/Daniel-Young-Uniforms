<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-full mx-auto">

        <!-- HERO SECTION -->
        <div class="w-[89%] mx-auto lg:flex flex-row max-h-[688px] h-auto lg:aspect-[1287/688] bg-dark-blue mt-8 relative overflow-clip">
            <div class="basis-[54%] max-lg:basis-full grid grid-flow-row grid-cols-2 justify-items-center relative">

                <!-- CAROUSEL 1 -->
                <div class="basis-[50%] w-full h-auto aspect-[374/688] relative" id="carousel-1">
                    <ul class="relative h-full w-full carousel" id="carousel-1-items">
                        <li class="slide-carousel-1 absolute top-0 left-0 w-full h-full">
                            <img src="/images/carousel-1.png" alt="" class="w-full h-auto" id="carousel-image">
                        </li>
                        <li class="slide-carousel-1 absolute top-0 left-0 w-full h-full">
                            <img src="/images/carousel-3.png" alt="" class="w-full h-auto">
                        </li>
                    </ul>
                </div>

                <!-- CAROUSEL 2 -->
                <div class="basis-[50%] w-full h-auto aspect-[374/688] relative" id="carousel-2">
                    <ul class="relative h-full w-full carousel" id="carousel-2-items">
                        <li class="slide-carousel-2 absolute top-0 left-0 w-full h-full">
                            <img src="/images/carousel-2.png" alt="" class="w-full h-auto">
                        </li>
                        <li class="slide-carousel-2 absolute bottom-0 left-0 w-full h-full">
                            <img src="/images/carousel-4.png" alt="" class="w-full h-auto">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="lg:basis-[46%] w-full max-lg:flex max-lg:flex-row max-lg:h-36 max-lg:absolute bottom-0 bg-dark-blue">
                <img src="/images/logo.png" alt="Logo" class="mx-auto basis-2/5 object-scale-down">
                <a href="{{ route('shop') }}" class="basis-3/5 max-lg:flex items-center justify-center">
                    <p class="bg-whiteish text-dark-blue font-semibold flex items-center justify-center w-1/2 h-12 max-lg:h-8 max-lg:text-xs mx-auto rounded-xl max-lg:rounded-sm">
                        Shop now
                    </p>
                </a>
            </div>
        </div>

        <!-- CATEGORIES SECTION -->
        <div class="w-[89%] max-md:w-[70%] mx-auto mt-32 md:mt-48">
            <h1 class="text-4xl max-md:text-2xl max-md:text-center font-bold my-6">CATEGORIES</h1>
            <div class="grid grid-cols-2 max-md:grid-cols-1 text-whiteish font-semibold max-md:text-base text-lg">
                @foreach($categories as $category)
                    <a href="{{ route('shop') . '?category=' . $category->id }}" class="relative">
                        <img src="{{ $category->image }}" alt="{{ $category->name }}">
                        <p class="w-full bg-dark-blue py-2 text-center rounded-t-md absolute bottom-0">{{ $category->name }}</p>
                    </a>
                @endforeach

            </div>

        </div>
    </div>

</x-app-layout>
