<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[85%] mx-auto">

        <div class="flex flex-col lg:flex-row mt-16 lg:mt-32 gap-x-16 gap-y-20">

            <section class="lg:basis-1/2">
                <div class="bg-dark-blue flex place-content-center aspect-[326/153] lg:aspect-square w-full">
                    <img src="/images/logo.png" alt="" class="object-scale-down">
                </div>
            </section>

            <section class="max-lg:w-10/12 lg:basis-1/2 text-sm lg:text-base">
                <h1 class="text-dark-blue font-semibold text-2xl lg:text-5xl mb-2 whitespace-nowrap">Create an Account</h1>
                <p class="text-profile-header mb-10 text-xs lg:text-base">Please fill in the information below to create your account</p>
                <form action="{{ route('register') }}" method="post" class="">
                    @csrf
                    @method('POST')
                    <div class="space-y-1 my-4">
                        <label for="company">Company Name</label>
                        <input type="text" name="company" id="company" placeholder="Acme Limited" value="{{ old('company') }}" class="block w-full h-10 pl-4 rounded-md text-xs lg:text-sm">
                        @error('company')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1 my-4">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" placeholder="John" value="{{ old('firstname') }}" class="block w-full h-10 pl-4 rounded-md text-xs lg:text-sm">
                        @error('firstname')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1 my-4">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Doe" value="{{ old('lastname') }}" class="block w-full h-10 pl-4 rounded-md text-xs lg:text-sm">
                        @error('lastname')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1 my-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" value="{{ old('email') }}" class="block w-full h-10 pl-4 rounded-md text-xs lg:text-sm">
                        @error('email')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1 my-4">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" placeholder="080 0000 0000" value="{{ old('phone') }}" class="block w-full h-10 pl-4 rounded-md text-xs lg:text-sm">
                        @error('phone')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1 my-4">
                        <label for="phone">Password</label>
                        <input type="password" name="password" id="password" placeholder="********" class="block w-full h-10 pl-4 rounded-md text-sm lg:text-sm">
                        @error('password')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-1 my-4">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" class="block w-full h-10 pl-4 rounded-md text-xs lg:text-sm">
                    </div>
                    <div class="relative text-xs lg:text-base flex flex-row items-center gap-1">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">
                            I have read and agree to the terms of the <a href="" class="text-dark-blue underline font-bold">privacy policy</a>
                        </label>
                    </div>
                    <div class="text-xs lg:text-xl mt-12">
                        <button type="submit" class="w-full py-2 text-whiteish bg-dark-blue hover:text-dark-blue hover:bg-whiteish hover:outline hover:outline-[0.1px] outline-dark-blue rounded-md">
                            Register
                        </button>
                    </div>
                </form>
                <p class="text-dark-gray text-center mt-12">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-dark-blue font-semibold">Login</a>
                </p>
            </section>
        </div>
    </div>

</x-app-layout>
