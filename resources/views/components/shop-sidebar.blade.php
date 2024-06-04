@props(['categories'])

<!-- SIDEBAR -->
<section class="basis-[28%] hidden lg:block bg-whiteish shadow-sm shadow-light-gray text-lg text-dark-gray rounded-lg py-20 space-y-5">
    <h1 class="text-dark-blue font-extrabold px-6">CATEGORIES</h1>
    <ul class="space-y-1">
        <li>
            <a href="{{ route('shop') }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish
               @if(Request::fullUrl() == (route('shop')))
                   bg-dark-blue text-white
               @endif">All</a>
        </li>
        @foreach($categories as $category)
            <li>
                <a href="{{ route('shop') . '?category=' . $category->id }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish
                @if((Request::fullUrl()) == ((route('shop') . '?category=' . $category->id)))
                    bg-dark-blue text-white
                @endif">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</section>
