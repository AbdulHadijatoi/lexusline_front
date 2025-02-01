@extends('layouts.app')



@section('content')
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl page-content">

         <!-- Display Success or Error Messages -->
            

        <div class="container mx-auto flex flex-col lg:flex-row py-4 gap-8">
            <!-- Graphic Section -->
            <div class="w-full lg:w-1/2 px-6 py-4">

                <div class="grid grid-cols-1">
                <h2 class="text-3xl font-semibold mb-4">Where to Find us</h2>
                    @include('components.card2', [
                        'card_image' => 'storage/uploads/contact_us_image1.png',
                        'card_title' => "United Kingdom, Europe Region", 
                        'card_text' => '8A, Water Lane Stratford E15 4NH, London, GB<br>
                                        <a href="tel:+447979817239">+44-7979-817239</a><br>
                                        gb@lexusline.co.uk',
                        
                    ])
                    @include('components.card2', [
                        'card_image' => 'storage/uploads/contact_us_image1.png',
                        'card_title' => "Pakistan, Asia Region", 
                        'card_text' => '305, Ibrahim Trade Tower Shahrah-E-Faisal 75500, Karachi, PK<br>
                                            <a href="tel:+92213458118">++92-21-3458118</a><br>
                                            pk@lexusline.co.uk',
                    ])
                    @include('components.card2', [
                        'card_image' => 'storage/uploads/contact_us_image1.png',
                        'card_title' => "UAE, MENA Region", 
                        'card_text' => '901, API World Tower Sheikh Zayed Road
                                        232268, Dubai AE<br>
                                        <a href="tel:+97143204766">+971-4-3204766</a><br>
                                        ae@lexusline.co.uk',
                    ])
                </div>
            </div>

            <!-- Newsletter Form Section -->
            <div class="w-full lg:w-1/2 px-6 py-4">
                <h2 class="text-3xl font-semibold mb-4">Get in touch with Us</h2>
                {{-- <p class="text-gray-600 mb-6">Receive news and insights that help you navigate supply chains, understand industry trends, and shape your logistics strategy.</p> --}}
                
                <form class="space-y-4" method="POST" action="{{ route('subscribe') }}">
                    @csrf
                    {{-- <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" id="name" name="name" required placeholder="Name" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div> --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="email" id="email" name="email" required placeholder="Enter an email" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea rows="6" id="message" name="message" required placeholder="Write message..." class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-blue-900 text-white font-medium py-3 rounded-md hover:bg-[var(--secondary)]">Submit Now</button>
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                </form>

                <p class="text-xs text-gray-500 mt-4">
                    By submitting this form, I agree to receive logistics-related news and marketing updates. I understand that I can opt out at any time by clicking the unsubscribe link.
                </p>
                <p class="text-xs text-gray-500 mt-2">
                    To see how we process your personal data, please see our <a href="{{ url('privacy-policy') }}" class="text-blue-500 hover-text-secondary">Privacy Policy</a>.
                </p>
            </div>
        </div>
    </div>
    {{-- <div class="bg-[#f8f9fa]">
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl page-content py-5 text-center">
    </div>
    </div> --}}

    

    
    
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection