<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[85%] mx-auto">
        <a href="{{ route('home') }}" class="mt-24 block text-dark-blue max-lg:text-sm font-bold space-x-3">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Go back</span>
        </a>

        <div class="flex flex-col lg:flex-row mt-16 lg:mt-24 gap-x-16 gap-y-20">

            <section class="lg:basis-[50%]">
                <div class="bg-dark-blue flex place-content-center aspect-[326/153] lg:aspect-square w-full">
                    <img src="./images/logo.png" alt="" class="object-scale-down">
                </div>
            </section>

            <section class="max-lg:w-10/12 lg:basis-[38%] text-xs">
                <h1 class="text-dark-blue font-semibold text-2xl lg:text-3xl mb-2">Login</h1>
                <p class="mb-10 text-auth-header">Enter your email address and password to login</p>
                <form action="{{ route('login') }}" method="post" class="">
                    @csrf
                    @method("POST")
                    <div class="space-y-2 my-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email Address" class="block w-full h-10 pl-4 rounded-md text-xs border-[1.5px] border-form-border">
                        @error('email')
                        <p class="text-red-500 italic">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-2 my-6">
                        <label for="phone">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="block w-full h-10 pl-4 rounded-md text-xs border-[1.5px] border-form-border">
                    </div>
                    <div class="relative flex flex-row items-center gap-2">
                        <input type="checkbox" name="remember_me" id="remember_me">
                        <label for="remember_me">Remember Me</label>
                        <a href="" class="absolute right-0 text-forgot-password">
                            Forgot Password
                        </a>
                    </div>
                    <div class="text-xs lg:text-lg mt-12 font-semibold">
                        <button type="submit" class="w-full py-2 text-whiteish bg-dark-blue hover:text-dark-blue hover:bg-whiteish hover:outline hover:outline-[0.1px] outline-dark-blue rounded-md">
                            Login
                        </button>
                    </div>
                </form>
                <p class="text-dark-gray text-center mt-12 text-sm">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-dark-blue font-semibold hover:underline">Sign up</a>
                </p>
            </section>
        </div>
    </div>

</x-app-layout>
