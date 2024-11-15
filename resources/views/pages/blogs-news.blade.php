@extends('layouts.app')



@section('content')
    
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl py-10 px-5 page-content">
        <div class="max-w-3xl mb-10">
            <h1 class="text-3xl sm:text-4xl font-light text-gray-800 mb-6">
                Blogs & News
            </h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($blogs && $blogs->count()>0)
                @foreach ($blogs as $blog)    
                    @include('components.blog-card', [
                        'card_image' => $blog->image_url,
                        'card_title' => $blog->title, 
                        'card_text' => $blog->description,
                        'card_btn_text' => 'Read More',
                        'card_link' => '/'.$blog->slug,
                    ])
                @endforeach
            @endif
        </div>
    </div>
    
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection