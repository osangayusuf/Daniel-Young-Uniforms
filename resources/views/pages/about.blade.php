<x-app-layout>

    <!-- MAIN BODY WRAPPER -->
    <div class="w-[97%] mx-auto">
        <!-- TOP SECTION -->
        <div class="flex items-center gap-1 text-xs md:text-base mt-16">
            <a href="{{ route('home') }}" class="mr-3 hover:scale-125 transition-all">
                <i class="fa-solid fa-house text-dark-blue text-2xl"></i>
            </a>
            <i class="fa-solid fa-chevron-right"></i>
            <p class="ml-2">About</p>
        </div>


        <!-- ABOUT SECTION WRAPPER -->
        <div class="w-[87%] mx-auto grid grid-cols-1 lg:grid-cols-2 grid-flow-row gap-12 lg:gap-24 mt-16 text-xs sm:text-sm md:text-base">

            <div class="space-y-5">
                <p>
                    Daniel Young Uniforms is a leading provider of high-quality, customized uniform solutions in Nigeria. With a strong focus on quality craftsmanship, innovative designs, and exceptional customer service, Daniel Young Uniforms has established itself as a trusted partner for businesses, schools, institutions, and organizations seeking durable and stylish uniforms tailored to their specific needs.
                </p>
                <p>
                    Daniel Young Uniforms offers a comprehensive range of uniform solutions tailored to meet the diverse needs of its clientele. From corporate uniforms to school uniforms and industrial workwear to hospitality uniforms, the company provides a variety of options to suit the specific requirements of each client. They also offer custom-made designs to ensure that each uniform reflects the unique identity and branding of the organization.
                </p>
            </div>

            <div class="bg-dark-blue aspect-[631/480] w-full h-auto flex place-content-center order-first lg:order-none">
                <img src="./images/logo.png" alt="object-scale-down">
            </div>

            <div>
                <p class="text-3xl sm:text-4xl md:text-6xl lg:text-[42px] italic text-dark-blue font-bold ml-5 sm:ml-10 leading-relaxed lg:leading-normal">
                    Image is everything...
                </p>
            </div>

            <div>
                <p>
                    Daniel Young Uniforms takes pride in offering a diverse range of uniform categories tailored to meet the specific needs of its clients. With a focus on quality, style, and functionality, the company ensures that each uniform category is designed and crafted with precision and attention to detail
                </p>
            </div>

            <div class="order-6 lg:order-5">
                <p>
                    By offering a comprehensive suite of services that encompass custom design, fabric selection, manufacturing, customization, sizing, and customer support, Daniel Young Uniforms demonstrates its commitment to excellence and customer satisfaction in the uniform manufacturing industry. Clients can trust the company to deliver exceptional uniforms that not only meet their specific requirements but also exceed their expectations in terms of quality, style, and functionality.
                </p>
            </div>

            <div class="order-5 lg:order-6">
                <p class="text-3xl sm:text-4xl md:text-6xl lg:text-[42px] italic text-dark-blue font-bold ml-5 sm:ml-10 leading-relaxed lg:leading-normal">
                    Creating Lasting Impressions...
                </p>
            </div>


        </div>
    </div>

</x-app-layout>
