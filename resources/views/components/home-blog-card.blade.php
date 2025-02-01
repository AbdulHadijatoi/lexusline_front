{{-- <article
    class="relative isolate flex flex-col justify-end overflow-hidden rounded-md bg-gray-900 px-8 py-8 pb-8 pt-70 sm:pt-40 lg:pt-70 {{ $classes }}">
    <img src="{{ $card_image }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
    <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
        <time datetime="{{ $card_time }}" class="mr-8">{{  $card_time }}</time>
    </div>
    <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
        <a href="{{ url($card_link ? '/blogs-news'.$card_link :'#') }}">
            <span class="absolute inset-0"></span>
            {!! $card_title !!}
        </a>
    </h3>
</article> --}}

<article class="relative isolate flex flex-col justify-end overflow-hidden rounded-md bg-gray-900 px-8 py-8  pt-70 sm:pt-40 lg:pt-70 {{ $classes }} group">
    <img src="{{ $card_image }}" alt="{{ $card_title }}" class="absolute inset-0 -z-10 h-full w-full object-cover">
    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
    <div class="transition-all duration-300 ease-in-out transform">
        <h3 class="text-xl font-semibold text-white group-hover:translate-y-[-20px] transition-transform duration-300">
            <time datetime="{{ $card_time }}" class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">{{  $card_time }}</time>
            {{ $card_title }}
        </h3>
        <p class="mt-2 text-sm text-gray-300 opacity-0 group-hover:opacity-100 group-hover:translate-y-[-20px] transition-all duration-300 ease-in-out">
            {{ Str::limit($card_description, 200) }}
        </p>
    </div>
    <a href="{{ route('blogs.show', $card_link) }}" class="absolute inset-0"></a>
</article>