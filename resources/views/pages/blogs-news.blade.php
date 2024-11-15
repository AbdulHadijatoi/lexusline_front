@extends('layouts.app')



@section('content')
    
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl py-10 px-5 page-content">
        <div class="max-w-3xl mb-10">
            <h1 class="text-3xl sm:text-4xl font-light text-gray-800 mb-6">
                Blogs & News
            </h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @include('components.blog-card', [
                'card_image' => 'https://picsum.photos/400/200?random=1',
                'card_title' => "Supply Chain and Logistics", 
                'card_text' => 'We focus on solving your supply chain needs from end to end, taking the complexity out of container shipping for you.',
                'card_btn_text' => 'Read More',
                'card_link' => '/1',
            ])
            @include('components.blog-card', [
                'card_image' => 'https://picsum.photos/400/200?random=2',
                'card_title' => "Supply Chain and Logistics", 
                'card_text' => 'We focus on solving your supply chain needs from end to end, taking the complexity out of container shipping for you.',
                'card_btn_text' => 'Read More',
                'card_link' => '/1',
            ])
            @include('components.blog-card', [
                'card_image' => 'https://picsum.photos/400/200?random=3',
                'card_title' => "Supply Chain and Logistics", 
                'card_text' => 'We focus on solving your supply chain needs from end to end, taking the complexity out of container shipping for you.',
                'card_btn_text' => 'Read More',
                'card_link' => '/1',
            ])
            @include('components.blog-card', [
                'card_image' => 'https://picsum.photos/400/200?random=4',
                'card_title' => "Supply Chain and Logistics", 
                'card_text' => 'We focus on solving your supply chain needs from end to end, taking the complexity out of container shipping for you.',
                'card_btn_text' => 'Read More',
                'card_link' => '/1',
            ])
        </div>
    </div>
    
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection