<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] mx-auto">

        <!--   CONTACT BODY WRAPPER -->
        <div class="w-11/12 mt-16 ml-4">

            <!-- TOP SECTION -->
            <div class="flex items-center gap-1 text-xs md:text-base">
                <a href="#" class="mr-3 hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-2xl"></i>
                </a>
                <i class="fa-solid fa-chevron-right"></i>
                <p class="ml-2">Contact</p>
            </div>

            <!-- CONTACT FORM SECTION -->
            <div class="w-5/6 lg:w-3/5 mx-auto text-blackish mt-20 font-light md:text-lg tracking-tight">
                <h1 class="text-center text-3xl md:text-5xl font-bold">Contact <span class="text-dark-blue">Us</span></h1>
                <p class="text-lg md:text-2xl text-center my-10">Whether you have feedback, inquiries or a complaint, we’re just a message or call away. Contact us now!</p>
                <form action="" class="space-y-8" method="post">
                    @csrf
                    @method('POST')
                    <div class="space-y-5">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="block w-full h-16 rounded-xl border border-dark-gray px-5">
                        @error('name')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-5">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="block w-full h-16 rounded-xl border border-dark-gray px-5">
                        @error('email')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-5">
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" placeholder="Type your message ..." class="block w-full h-40 rounded-xl border border-dark-gray px-5 py-5 break-words">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="py-10">
                        <button type="submit" class="bg-dark-blue text-whiteish flex items-center justify-center gap-10 font-semibold text-sm w-full max-w-96 py-5 rounded-xl">
                            Send Message
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
                <p class="text-2xl font-semibold text-center my-16">Or</p>

                <div class="flex flex-row items-center gap-5 mt-20 py-2 text-sm md:text-xl lg:text-3xl">
                    <i class="fa-solid fa-phone"></i>
                    <a href="tel:+234 0000 000 0000" class="">
                        +234 0000 000 0000
                    </a>
                </div>

                <div class="flex flex-row items-center gap-5 py-2 text-sm md:text-xl lg:text-3xl">
                    <i class="fa-solid fa-envelope"></i>
                    <a href="mailto:karambatraining@gmail.com" class="">
                        karambatraining@gmail.com
                    </a>
                </div>
            </div>



        </div>
    </div>

</x-app-layout>
