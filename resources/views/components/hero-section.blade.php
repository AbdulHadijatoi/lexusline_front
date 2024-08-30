<div class="relative">
    <img src="{{ url(settings()->hero_image) }}" class="absolute inset-0 object-cover w-full h-full" alt="hero_image" />
    <div class="relative bg-gray-900 bg-opacity-75">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="flex flex-col items-center justify-between xl:flex-row">
            <div class="w-full max-w-xl mb-12 xl:mb-0 xl:pr-16 xl:w-7/12">
            <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-white sm:text-4xl sm:leading-none">
                {{ settings()->hero_title }}
            </h2>
            <p class="max-w-xl mb-4 text-base text-gray-400 md:text-lg">
                {{ settings()->hero_text }}
            </p>
            <a href="#" aria-label="" class="bg-white text-gray-800 rounded-md px-5 py-3 inline-flex items-center tracking-wider transition-colors duration-200 hover-text-secondary">
                {{ settings()->hero_btn_text }}
            </a>
            </div>
            <div class="w-full max-w-xl xl:px-8 xl:w-5/12">
            <div class="bg-white rounded shadow-2xl p-7 sm:p-10">
                <h3 class="mb-4 text-xl font-semibold sm:text-center sm:mb-6 sm:text-2xl">
                Sign up for updates
                </h3>
                <form>
                <div class="mb-1 sm:mb-2">
                    <label for="firstName" class="inline-block mb-1 font-medium">First name</label>
                    <input
                    placeholder="John"
                    required=""
                    type="text"
                    class="flex-grow w-full h-12 px-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded shadow-sm appearance-none focus:border-deep-purple-accent-400 focus:outline-none focus:shadow-outline"
                    id="firstName"
                    name="firstName"
                    />
                </div>
                <div class="mb-1 sm:mb-2">
                    <label for="lastName" class="inline-block mb-1 font-medium">Last name</label>
                    <input
                    placeholder="Doe"
                    required=""
                    type="text"
                    class="flex-grow w-full h-12 px-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded shadow-sm appearance-none focus:border-deep-purple-accent-400 focus:outline-none focus:shadow-outline"
                    id="lastName"
                    name="lastName"
                    />
                </div>
                <div class="mb-1 sm:mb-2">
                    <label for="email" class="inline-block mb-1 font-medium">E-mail</label>
                    <input
                    placeholder="john.doe@example.org"
                    required=""
                    type="text"
                    class="flex-grow w-full h-12 px-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded shadow-sm appearance-none focus:border-deep-purple-accent-400 focus:outline-none focus:shadow-outline"
                    id="email"
                    name="email"
                    />
                </div>
                <div class="mt-4 mb-2 sm:mb-4">
                    <button
                    type="submit"
                    class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                    >
                    Subscribe
                    </button>
                </div>
                <p class="text-xs text-gray-600 sm:text-sm">
                    We respect your privacy. Unsubscribe at any time.
                </p>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>