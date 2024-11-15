<div class="w-full mx-auto mb-10 md:mb-0">
    <div>
        <img src="{{ $card_image }}" alt="" class="rounded-t bg-center shadow-2xl w-full object-cover h-[14rem]"/>
        <div class="bg-white shadow rounded-b min-h-[10rem]">
            <div class="px-4">
                <h2 class="text-gray-700 text-xl font-medium pt-6">{!! $card_title !!}</h2>
                <p class="text-gray-500 pt-2 text-sm">{!! $card_text !!}</p>
            </div>
            @if(!empty($card_btn_text))
                <a href="{{ url($card_link ? '/blogs-news'.$card_link :'#') }}" class="flex justify-center items-center w-fit my-6 px-5 pt-1 pb-2 rounded text-gray-700">
                    <button class="text-sm uppercase mr-1">{{ $card_btn_text }}</button>
                    <i class='bx bx-chevron-right text-xl'></i>
                </a>
            @endif
        </div>
    </div>
</div>
