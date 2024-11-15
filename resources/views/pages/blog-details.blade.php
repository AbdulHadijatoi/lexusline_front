@extends('layouts.app')



@section('content')
    
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl py-10 px-5 page-content">
        <div class="container mx-auto px-4 py-8">
            <!-- Blog Image and Meta Data -->
            <div class="mb-6">
                <img src="https://picsum.photos/1080/600?random=1" alt="Blog Image" class="w-full h-[30rem] object-cover rounded-lg mb-4">
                <div class="flex items-end text-gray-600 space-x-4 text-sm">
                    <span class="font-semibold">Published:</span>
                    <span>November 12, 2024</span>
                </div>
            </div>

            <!-- Blog Heading -->
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Your Blog Heading Here</h1>

            <!-- Blog Description -->
            <div class="space-y-4 text-gray-700 leading-relaxed">
                <p>
                    This is the first paragraph of the blog content. You can provide a general introduction or overview of the blog topic here.
                </p>
                <p>
                    This is another paragraph with additional information. You can add as many paragraphs as needed to elaborate on the topic and keep readers engaged.
                </p>
                <ul class="list-disc list-inside">
                    <li>Key point or insight #1 about the blog topic.</li>
                    <li>Another relevant point or detail to include.</li>
                    <li>Further elaboration or useful information.</li>
                </ul>
            </div>
        </div>

    </div>
    
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection