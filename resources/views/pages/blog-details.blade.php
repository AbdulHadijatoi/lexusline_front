@extends('layouts.app')



@section('content')
  
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl py-10 px-5 page-content">
        <div class="container mx-auto px-4 py-8">
            <!-- Blog Image and Meta Data -->
            <div class="mb-6">
                <img src="{{ $blog->image_url }}" alt="Blog Image" class="w-full h-[30rem] object-cover rounded-lg mb-4">
                <div class="flex items-end text-gray-600 space-x-4 text-sm">
                    <span class="font-semibold">Published:</span>
                    <span>{{ $blog->created_at? \Carbon\Carbon::parse($blog->created_at)->format('M d, Y'): '' }}</span>
                </div>
            </div>

            <!-- Blog Heading -->
            <h1 class="text-4xl text-gray-800 mb-8">{{ $blog->title }}</h1>

            <!-- Blog Description -->

                @if($blog->blogContents && $blog->blogContents->count()>0)
                    @foreach ($blog->blogContents as $content)
                        <div class="container mx-auto flex flex-col lg:flex-row items-start gap-8 mb-5">
                            
                            <div class="w-full {{ $content && $content->image_url ? 'lg:w-1/2' : ''}}">
                                <h2 class="text-3xl font-light mb-4">{{ $content->title }}</h2>
                                <p class="text-gray-600 text-justify mb-6 blog-content-description">
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

    </div>
    
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection