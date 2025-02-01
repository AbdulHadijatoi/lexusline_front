{{-- <div class="w-full mx-auto max-w-xs overflow-hidden bg-white">
    <img class="object-cover w-full h-56" src="{{ url($card_image) }}" alt="card_image">

    <div class="py-5 text-center">
        <a href="#" class="block text-xl font-bold text-gray-800" tabindex="0" role="link">{!! $card_title !!}</a>
        <span class="text-sm text-gray-700"></span>
    </div>
</div> --}}

 <div class="relative overflow-hidden select-none text-gray-700 mb-6">

    <div class="flex flex-col rounded-md">
        {{-- <svg class="w-6 h-6 text-gray-400 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
        </svg> --}}

        <div class="space-y-2">
            <p class="text-lg font-semibold">{!! $card_title !!}</p>
            <p class="text-sm text-muted-foreground">{!! $card_text !!}</p>
        </div>
    </div>
</div>