<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[85%] mx-auto">

        <div class="flex flex-col lg:flex-row mt-16 lg:mt-32 gap-x-16 gap-y-20">

            <section class="lg:basis-1/2">
                <div class="bg-dark-blue flex place-content-center aspect-[326/153] lg:aspect-square w-full">
                    <img src="./images/logo.png" alt="" class="object-scale-down">
                </div>
            </section>

            <section class="max-lg:w-10/12 lg:basis-1/2 text-sm lg:text-base">
                <h1 class="text-dark-blue font-semibold text-2xl lg:text-5xl mb-2">Login</h1>
                <p class="text-profile-header mb-10 text-xs lg:text-base">Enter your email address and password to login</p>
                <form action="{{ route('login') }}" method="post" class="">
                    @csrf
                    @method("POST")
                    <div class="space-y-1 my-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email Address" class="block w-full h-10 pl-4 rounded-md text-xs lg:text-sm">
                        @error('email')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1 my-4">
                        <label for="phone">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="block w-full h-10 pl-4 rounded-md text-xs lg:text-sm">
                    </div>
                    <div class="relative text-xs lg:text-base flex flex-row items-center gap-1">
                        <input type="checkbox" name="remember_me" id="remember_me">
                        <label for="remember_me">Remember Me</label>
                        <a href="" class="absolute right-0 text-forgot-password">
                            Forgot Password
                        </a>
                    </div>
                    <div class="text-xs lg:text-xl mt-12">
                        <button type="submit" class="w-full py-2 text-whiteish bg-dark-blue hover:text-dark-blue hover:bg-whiteish rounded-md">
                            Login
                        </button>
                    </div>
                </form>
                <p class="text-dark-gray text-center mt-12">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-dark-blue font-semibold">Sign up</a>
                </p>
            </section>
        </div>
    </div>

</x-app-layout>
