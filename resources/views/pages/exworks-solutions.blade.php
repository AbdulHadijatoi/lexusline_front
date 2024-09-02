@extends('layouts.app')

@section('title', 'Home Page') <!-- This will override the default title -->

@section('content')
    @include('components.hero-common', [
        'hero_image' => settings()->hero_image, 
        'hero_title' => settings()->hero_title, 
        'hero_text' => settings()->hero_text, 
    ])

    
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection