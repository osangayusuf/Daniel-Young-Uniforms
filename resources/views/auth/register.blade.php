<x-app-layout>

    <div id="privacy" class="sticky top-0 w-full h-full text-dark-blue bg-white bg-opacity-50 z-10 pt-10 pb-20 hidden">
        <div class="bg-white bg-opacity-100 w-4/5 text-[9px] lg:text-sm font-medium space-y-6 mx-auto p-7 pb-10 lg:pt-10 lg:pb-16 lg:px-20 rounded-xl shadow-form-border shadow-md relative">
            <button id="close-privacy" type="button" class="block hover:text-red-800">
                <i class="fa-solid fa-x absolute right-7 lg:right-10 text-lg lg:text-2xl"></i>
            </button>
            <h1 class="text-xl lg:text-3xl font-bold pt-5">
                Privacy Policy
            </h1>
            <p>
                We at Daniel Young Uniforms are committed to protecting the privacy of our users. This Privacy Policy outlines the information we collect, how we use it, and the choices you have regarding your data.
            </p>
            <div class="space-y-1">
                <span class="block font-bold">Information We Collect</span>
                <ul class="list-disc pl-6">
                    <li>Personal Information: We may collect personal information such as your name, email address, and other contact details when you register an account or communicate with us.</li>
                    <li>Usage Data: We automatically collect certain information about your device and how you interact with our website, including IP address, browser type, pages visited, and other analytics data.</li>
                </ul>
            </div>
            <div class="space-y-1">
                <span class="block font-bold">How We Use Your Information</span>
                <ul class="list-disc pl-6">
                <li>Provide and Maintain Services: We use your information to operate, maintain, and improve our website and services, and to communicate with you about updates and important notices.</li>
                <li>Personalization: We may use your information to personalize your experience on our website, such as recommending content or features that may be of interest to you.</li>
                <li>Legal Compliance: We may use your information to comply with applicable laws, regulations, or legal processes, or to respond to lawful requests from authorities.</li>
                </ul>
            </div>
            <div class="space-y-1">
                <span class="block font-bold">Information Sharing</span>
                <p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this Privacy Policy or as required by law.</p>
            </div>
            <div class="space-y-1">
                <span class="block font-bold">Data Security</span>
                <p>We take reasonable measures to protect your information from unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>
            </div>
            <div class="space-y-1">
                <span class="block font-bold">Changes to This Policy</span>
                <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>
            </div>
            <div class="space-y-1">
                <span class="block font-bold">Contact Us</span>
                <p>If you have any questions or concerns about this Privacy Policy, please contact us.</p>
            </div>
        </div>
    </div>
    <!-- MAIN BODY WRAPPER -->
    <div class="w-[85%] mx-auto">
        <a href="" class="mt-24 block max-lg:text-sm text-dark-blue font-bold space-x-3">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Go back</span>
        </a>

        <div class="flex flex-col lg:flex-row mt-16 lg:mt-24 gap-x-16 gap-y-20">

            <section class="lg:basis-[50%]">
                <div class="bg-dark-blue flex place-content-center aspect-[326/153] lg:aspect-square w-full">
                    <img src="/images/logo.png" alt="" class="object-scale-down">
                </div>
            </section>

            <section class="max-lg:w-10/12 lg:basis-[38%] text-xs">
                <h1 class="text-dark-blue font-semibold text-2xl lg:text-3xl mb-2 whitespace-nowrap">Create an Account</h1>
                <p class="mb-10 text-auth-header">Please fill in the information below to create your account</p>
                <form action="{{ route('register') }}" method="post" class="">
                    @csrf
                    @method('POST')
                    <div class="space-y-2 my-6">
                        <label for="company">Company Name</label>
                        <input type="text" name="company" id="company" placeholder="Acme Limited" value="{{ old('company') }}" class="block w-full h-10 pl-4 rounded-md text-xs border-[1.5px] border-form-border">
                        @error('company')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-2 my-6">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" placeholder="John" value="{{ old('firstname') }}" class="block w-full h-10 pl-4 rounded-md text-xs border-[1.5px] border-form-border">
                        @error('firstname')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-2 my-6">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Doe" value="{{ old('lastname') }}" class="block w-full h-10 pl-4 rounded-md text-xs border-[1.5px] border-form-border">
                        @error('lastname')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-2 my-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" value="{{ old('email') }}" class="block w-full h-10 pl-4 rounded-md text-xs border-[1.5px] border-form-border">
                        @error('email')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-2 my-6">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" placeholder="080 0000 0000" value="{{ old('phone') }}" class="block w-full h-10 pl-4 rounded-md text-xs border-[1.5px] border-form-border">
                        @error('phone')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-2 my-6">
                        <label for="phone">Password</label>
                        <input type="password" name="password" id="password" placeholder="********" class="block w-full h-10 pl-4 rounded-md text-xs border-[1.5px] border-form-border">
                        @error('password')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-2 my-6">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" class="block w-full h-10 pl-4 rounded-md text-xs border-[1.5px] border-form-border">
                    </div>
                    <div class="relative text-xs lg:text-sm flex flex-row items-center gap-3">
                        <input type="checkbox" name="privacy" id="privacy">
                        <label for="privacy">
                            I have read and agree to the terms of the
                            <button id="show-privacy" type="button" class="text-dark-blue underline font-bold hover:opacity-75">privacy policy</button>
                        </label>
                        @error('privacy')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="text-xs lg:text-lg mt-12">
                        <button type="submit" class="w-full py-2 text-whiteish bg-dark-blue hover:text-dark-blue hover:bg-whiteish hover:outline hover:outline-[0.1px] outline-dark-blue rounded-md">
                            Register
                        </button>
                    </div>
                </form>
                <p class="text-dark-gray text-center mt-12 text-sm">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-dark-blue font-semibold">Login</a>
                </p>
            </section>
        </div>
    </div>

</x-app-layout>
