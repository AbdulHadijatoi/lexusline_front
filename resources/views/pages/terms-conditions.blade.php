@extends('layouts.app')



@section('content')
    
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl py-10 px-5 page-content">

        @php
            $pageContents = getPageContent();
        @endphp

        <!-- Newsletter Form Section -->
        @if($pageContents && $pageContents->count()>0)
            @foreach ($pageContents as $content)
                <div class="container mx-auto p-6 flex flex-col lg:flex-row items-start gap-8 mb-5">
                     
                    <div class="w-full {{ $content && $content->image_url ? 'lg:w-1/2' : ''}}">
                        <h2 class="text-4xl font-light mb-4">{{ $content->title }}</h2>
                        <p class="text-gray-600 mb-6">
                            {!! $content->description !!}
                        </p>
                    </div>

                    @if($content->image_url)
                        <div class="w-full lg:w-1/2 flex justify-center">
                            <img src="{{ $content->image_url }}" alt="Page Content Image" class="w-full max-w-sm">
                        </div>
                    @endif

                </div>
            @endforeach
        @endif


    </div>
    
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection