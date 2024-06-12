<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] mx-auto">

        <!--   CONTACT BODY WRAPPER -->
        <div class="w-11/12 mt-16 ml-4">

            <!-- TOP SECTION -->
            <div class="flex items-center gap-1 text-xs md:text-base">
                <a href="{{ route('home') }}" class="mr-3 hover:scale-125 transition-all">
                    <i class="fa-solid fa-house text-dark-blue text-2xl"></i>
                </a>
                <i class="fa-solid fa-chevron-right"></i>
                <p class="ml-2">Contact Us</p>
            </div>

            <div class="flex flex-col lg:flex-row mt-10 lg:mt-36 lg:ml-12 gap-x-16 gap-y-7 w-[90%] lg:w-full mx-auto">
                <section class="basis-7/12 w-full">
                    <div class="aspect-[683/498] w-full h-auto object-cover">
                        <img src="/images/map.png" alt="google map" class="h-full w-full">
                    </div>
                </section>

                <section class="basis-5/12 text-xs sm:text-base md:text-lg space-y-4 w-3/4 lg:w-full">
                    <h1 class="font-bold text-2xl md:text-3xl">Business Hours</h1>
                    <div class="space-y-0.5">
                        <p class="font-semibold">MONDAY TO FRIDAYS</p>
                        <p>9:00AM - 5:00PM</p>
                    </div>
                    <div class="space-y-0.5">
                        <p class="font-semibold">SATURDAYS</p>
                        <p>9:00AM - 5:00PM</p>
                    </div>
                    <a href="tel:+2347083783407" class="block space-x-2">
                        <i class="fa-solid fa-phone text-dark-blue"></i>
                        <span>0708 378 3407</span>
                    </a>
                    <a href="mailto:sales@danielyounguniforms.com.ng" class="block whitespace-nowrap space-x-2">
                        <i class="fa-solid fa-envelope text-dark-blue"></i>
                        <span>sales@danielyounguniforms.com.ng</span>
                    </a>
                    <a href="" class="flex gap-4 lg:gap-5">
                        <i class="fa-solid fa-location-dot text-dark-blue"></i>
                        <span>Plot 8, Stream Wood Garden Estate, Airport Road, Lugbe, Abuja.</span>
                    </a>
                </section>
            </div>

            <p class="mt-44 mb-32 text-center md:text-2xl font-bold">OR</p>

            <!-- CONTACT FORM SECTION -->
            <div class="w-5/6 lg:w-3/5 mx-auto text-blackish mt-20 font-light text-xs md:text-lg tracking-tight">
                <h1 class="lg:text-center text-2xl md:text-5xl font-bold">Contact <span class="text-dark-blue">Us</span></h1>
                <p class="text-xs md:text-2xl lg:text-center my-3 lg:my-10">Whether you have feedback, inquiries or a complaint, we’re just a message or call away. Contact us now!</p>
                <form action="" class="space-y-8" method="post">
                    @csrf
                    @method('POST')
                    <div class="space-y-2 lg:space-y-5">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="John Doe" class="block w-full lg:h-16 rounded-lg border-[1.5px] border-form-border px-5 text-xs md:text-sm">
                        @error('name')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-2 lg:space-y-5">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="johndoe@gmail.com" class="block w-full lg:h-16 rounded-lg border-[1.5px] border-form-border px-5 text-xs md:text-sm">
                        @error('email')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-2 lg:space-y-5">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" placeholder="Type your message ..." class="block w-full h-24 lg:h-40 rounded-lg border-[1.5px] border-form-border px-5 py-5 break-words text-xs md:text-sm">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-red-500 italic text-xs lg:text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="py-10">
                        <button type="submit" class="bg-dark-blue text-whiteish flex items-center justify-center gap-10 font-semibold w-4/5 py-4 lg:py-5 rounded-lg hover:text-dark-blue hover:bg-whiteish hover:outline hover:outline-[0.1px] outline-dark-blue">
                            Send Message
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </form>

            </div>



        </div>
    </div>

</x-app-layout>
