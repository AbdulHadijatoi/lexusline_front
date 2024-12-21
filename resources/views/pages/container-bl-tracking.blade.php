@extends('layouts.app')

@section('content')

<div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl py-10 px-5 page-content">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 w-full text-center">Result for "{{ $container_number }}"</h2>
        
        @foreach ($trackingResults as $result)
            <div class="border border-gray-200 rounded-lg mb-4">
                <!-- Summary Section -->
                <div class="flex justify-between items-center px-4 py-3 bg-gray-50">
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Port of Load</span>
                        <span class="font-medium text-gray-900">{{ $result->originPort->name ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Port of Discharge</span>
                        <span class="font-medium text-gray-900">{{ $result->destinationPort->name ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Container Number.</span>
                        <span class="font-medium text-gray-900">{{ $result->container_number }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">BL Number</span>
                        <span class="font-medium text-gray-900">{{ $result->bl_number }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Date</span>
                        <span class="font-medium text-gray-900">{{ $result->date }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Container Details</span>
                        <span class="font-medium text-gray-900">{{ $result->container_details ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">BL Details</span>
                        <span class="font-medium text-gray-900">{{ $result->bl_details ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Remarks</span>
                        <span class="font-medium text-gray-900">{{ $result->remarks ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
