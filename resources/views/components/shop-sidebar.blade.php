@props(['sub_categories', 'current_category'])

<!-- SIDEBAR -->
<section class="basis-[28%] hidden lg:block bg-whiteish shadow-sm shadow-light-gray text-sm md:text-base text-dark-gray rounded-lg py-20 space-y-5">
    @if(!is_null($current_category))
        <h1 class="text-dark-blue md:text-lg font-bold px-6">{{ \App\Models\Category::whereId($current_category)->first()->name }}</h1>
    @endif
    <ul class="space-y-1">
        @if(!is_null($current_category))
            @foreach($sub_categories as $sub)
                <li>
                    <div class="px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish relative">
                        <a href="{{ route('shop') . '?category=' . $current_category . '&sub=' . $sub->sub_category }}" class="block w-4/5 h-full">
                            {{$sub->sub_category}}
                        </a>
                        @if(!is_null($sub->classification[0]->classification))
                            <button id="open-dropdown" class="absolute right-0 top-1/2 z-20 w-20 -translate-y-1/2">
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                        @endif
                    </div>
                        <ul id="dropdown" class="hidden">
                        @foreach($sub->classification as $class)
                            <li class="text-xs md:text-sm mx-4">
                                <a href="{{ route('shop') . '?category=' . $current_category . '&sub=' . $sub->sub_category . '&class=' . $class->classification }}" class="block px-6 py-2 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">
                                    {{ $class->classification }}
                                </a>
                            </li>
                        @endforeach
                        </ul>
                </li>
            @endforeach
        @else
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('shop') . '?category=' . $category->id }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish
                    @if((Request::fullUrl()) == ((route('shop') . '?category=' . $category->id)))
                        bg-dark-blue text-white
                    @endif">{{ $category->name }}</a>
                </li>
            @endforeach
        @endif
    </ul>
</section>
