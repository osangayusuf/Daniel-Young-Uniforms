<ul id="profile-menu" class="absolute top-8 left-0 rounded-md shadow-xl bg-whiteish text-dark-gray py-4 hidden">
    <li>
        <a href="{{ route('profile.edit') }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">
            <i class="fa-solid fa-user text-center mr-2"></i>
            Profile
        </a>
    </li>
    <li>
        <a href="{{ route('profile.view-address') }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">
            <i class="fa-solid fa-location-dot text-center mr-2"></i>
            Manage Addresses
        </a>
    </li>
    <li>
        <a href="{{ route('profile.manage-password') }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">
            <i class="fa-solid fa-lock text-center mr-2"></i>
            Manage Password
        </a>
    </li>
    <li>
        <a href="{{ route('profile.orders') }}" class="block px-6 py-3 rounded-lg mx-1 hover:bg-light-purple hover:text-whiteish">
            <i class="fa-solid fa-bag-shopping text-center mr-2"></i>
            My Orders
        </a>
    </li>
</ul>

