{{-- <div class="w-full mx-auto max-w-xs overflow-hidden bg-white">
    <img class="object-cover w-full h-56" src="{{ url($card_image) }}" alt="card_image">

    <div class="py-5 text-center">
        <a href="#" class="block text-xl font-bold text-gray-800" tabindex="0" role="link">{!! $card_title !!}</a>
        <span class="text-sm text-gray-700"></span>
    </div>
</div> --}}

 <div class="relative overflow-hidden select-none p-2 text-gray-700">
    <div class="flex flex-col justify-between rounded-md p-6">
        <div class="space-y-2">
            <p class="text-lg font-semibold">{!! $card_title !!}</p>
            <p class="text-sm text-muted-foreground">{!! $card_text !!}</p>
        </div>
    </div>
</div>