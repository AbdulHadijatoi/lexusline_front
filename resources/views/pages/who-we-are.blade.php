@extends('layouts.app')



@section('content')
    
    <div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl py-10 px-5">

        <div class="container mx-auto p-6 flex flex-col lg:flex-row items-center gap-8">
            

            <!-- Newsletter Form Section -->
            <div class="w-full lg:w-1/2">
                <h2 class="text-4xl font-light mb-4">Our Company</h2>
                <p class="text-gray-600 mb-6">
                <ul class="list-disc gap-2 flex flex-col items-center gap-8">
                    <li>
                        Established in 2017, Lexus Container Line has emerged as a leading player in the container shipping industry, offering a comprehensive range of services tailored to meet the evolving demands of global trade. With a focus on innovation, sustainability, and operational excellence, we have built a reputation for delivering seamless logistics solutions that drive business success.
                    </li>
                    <li>
                        Container Shipping: We offer a wide range of container shipping services of full container load (FCL) options to meet your specific cargo requirements.
                    </li>
                    <li>
                        Global Network: With a vast network of strategic partners and agents worldwide, we ensure efficient and timely delivery of your cargo to destinations across the globe.
                    </li>
                </ul>
                
                
                
                </p>
            </div>

            <!-- Graphic Section -->
            <div class="w-full lg:w-1/2 flex justify-center">
                <img src="{{ 'storage/uploads/contact_us_image.webp' }}" alt="Person on couch with laptop" class="w-full max-w-sm">
            </div>
        </div>


    </div>
    
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection