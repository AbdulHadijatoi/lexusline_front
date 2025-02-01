@extends('layouts.app')



@section('content')
        <section class="bg-gray-100">
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl page-content">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
                <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900">Visit Our Location</h2>
                    <p class="mt-4 text-lg text-gray-500">Easily Accessible Hubs for All Your Shipping Needs</p>
                </div>
                <div class="mt-16 lg:mt-20">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="rounded-lg overflow-hidden">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27221.67555688766!2d55.292650808743566!3d25.22976371916083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f134e609581e1%3A0x6947d732a1d95d91!2sAPI%20WORLD%20TOWER!5e0!3m2!1sen!2som!4v1738431710136!5m2!1sen!2som" width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            {{-- <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11672.945750644447!2d-122.42107853750231!3d37.7730507907087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858070cc2fbd55%3A0xa71491d736f62d5c!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1619524992238!5m2!1sen!2sus"
                                width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                        </div>
                        <div>
                            <div class="max-w-full mx-auto rounded-lg overflow-hidden">
                                <div class="px-6 py-4">
                                    <h3 class="text-lg font-medium text-gray-900">Our Address</h3>
                                    <p class="mt-1 text-gray-600">API World Tower Sheikh Zayed 232268, Dubai AE</p>
                                </div>
                                <div class="border-t border-gray-200 px-6 py-4">
                                    <h3 class="text-lg font-medium text-gray-900">Hours</h3>
                                    <p class="mt-1 text-gray-600">Monday - Friday: 9am - 5pm</p>
                                    <p class="mt-1 text-gray-600">Saturday: 10am - 4pm</p>
                                    <p class="mt-1 text-gray-600">Sunday: Closed</p>
                                </div>
                                <div class="border-t border-gray-200 px-6 py-4">
                                    <h3 class="text-lg font-medium text-gray-900">Contact</h3>
                                    <p class="mt-1 text-gray-600">Email: info@lexusline.co.uk</p>
                                    <p class="mt-1 text-gray-600">Phone: +971 43204766</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        </section>
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl page-content">


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
                <h2 class="text-3xl font-semibold mb-4">Contact Us</h2>
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