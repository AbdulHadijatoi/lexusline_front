<div class="relative">
    <img src="{{ $hero_image }}" class="absolute inset-0 object-cover w-full h-full" alt="hero_image" />
    <div class="relative bg-gray-900 bg-opacity-75">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="flex flex-col items-center justify-center xl:flex-row min-h-[25rem]">
                <div class="w-full mb-12 xl:mb-0 xl:pr-16 text-center">
                    <h2 class="mb-6 font-sans text-3xl font-bold tracking-tight text-white sm:text-4xl sm:leading-none">
                        {{ $hero_title }}
                    </h2>
                    <p class="mb-4 text-base text-gray-400 md:text-lg">
                        {{ $hero_text }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>