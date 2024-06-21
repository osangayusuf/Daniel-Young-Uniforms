<section class="basis-[26%] h-[30rem] bg-whiteish shadow-sm shadow-dark-gray text-lg text-dark-gray rounded-xl space-y-5 pt-10 pb-20 hidden lg:block">

    <ul class="my-3 class whitespace-nowrap">
        <li class="">
            <a href="{{ route('profile.edit') }}" class="px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish flex flex-row items-center">
                <i class="fa-solid fa-user w-5 text-center mr-4"></i>
                Profile
            </a>
        </li>
        <li class="">
            <a href="{{ route('profile.view-address') }}" class="px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish flex flex-row items-center">
                <i class="fa-solid fa-location-dot w-5 text-center mr-4"></i>
                Manage Addresses
            </a>
        </li>
        <li class="">
            <a href="{{ route('profile.manage-password') }}" class="px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish flex flex-row items-center">
                <i class="fa-solid fa-lock w-5 text-center mr-4"></i>
                Manage Password
            </a>
        </li>
        <li class="">
            <a href="{{ route('profile.orders') }}" class="px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish flex flex-row items-center">
                <i class="fa-solid fa-bag-shopping w-5 text-center mr-4"></i>
                My Orders
            </a>
        </li>
    </ul>

</section>

