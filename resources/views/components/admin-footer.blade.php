@props(['categories'])

<!-- FOOTER SECTION -->
<div class="flex flex-row text-[8px] md:text-xs px-2 lg:px-5 mt-56">
    <div class="basis-5/12 space-y-3">
        <h2 class="font-semibold">DANIEL YOUNG UNIFORMS</h2>
        <p>Image is Everything</p>
    </div>
    <div class="basis-1/4 space-y-2" >
        <h2 class="uppercase font-semibold">
            Navigation
        </h2>
        <ul class="space-y-1">
            <li>
                <a href="{{ route('admin.home') }}">Home</a>

            </li>
            <li>
                <a href="{{ route('admin.pre-products') }}">Products</a>
            </li>
            <li>
                <a href="{{ route('admin.orders') }}">Orders</a>
            </li>
            <li>
                <a href="{{ route('admin.customers') }}">Customers</a>
            </li>
        </ul>
    </div>
    <div class="basis-1/4 space-y-2">
        <h2 class="uppercase font-semibold">
            Categories
        </h2>
        <ul class="space-y-1">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('admin.products') . '?category=' . $category->id }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="text-black gap-2 basis-1/5 flex flex-col sm:flex-row place-items-center text-xl">
        <a href="" class="">
            <i class="fa-instagram fa-brands"></i>
        </a>
        <a href="" class="">
            <i class="fa-x-twitter fa-brands"></i>
        </a>
        <a href="" class="">
            <i class="fa-brands fa-square-facebook"></i>
        </a>
        <a href="" class="">
            <i class="fa-envelope fa-regular"></i>
        </a>
    </div>
</div>
<p class="text-sm text-center pt-12 pb-5">All Rights Reserved By @Daniel Young Uniforms</p>

