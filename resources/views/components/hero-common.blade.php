<div class="relative">
    <img src="{{ url(getHeroImage()) }}" class="absolute inset-0 object-cover w-full h-full" alt="hero_image" />
    <div class="relative bg-gray-900 bg-opacity-75">
        <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="breadcrumbs text-sm text-base-300" style="margin-top: 70px; visibility: hidden">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    @foreach(generateBreadcrumbs() as $breadcrumb)
                        @if (!$loop->last)
                            <li><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                        @else
                            <li class="text-base-300">{{ $breadcrumb['name'] }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="px-4 py-10 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-10">
            <div class="flex flex-col items-center justify-center xl:flex-row">
                <div class="w-full mb-12 xl:mb-0 xl:pr-16 text-center">
                    <h1 class="mb-6 font-sans text-3xl font-bold tracking-tight text-white sm:text-4xl sm:leading-none">
                        {{ getPageName() }}
                    </h1>
                    @if(getHeroText())
                    <p class="mb-4 text-base text-gray-400 md:text-lg">
                        {{ getHeroText() }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>