@extends('layouts.app')

@section('content')

<div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl py-10 px-5 page-content">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 w-full text-center">{{ $origin }} to {{ $destination }}</h2>
        
        <!-- Tracking Results -->
        @foreach ($vesselTrackingResults as $result)
            <div class="border border-gray-200 rounded-lg mb-4">
                <!-- Summary Section -->
                <div class="flex justify-between items-center px-4 py-3 bg-gray-50">
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">ROT No.</span>
                        <span class="font-medium text-gray-900">{{ $result->rot_number ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Vessel Name</span>
                        <span class="font-medium text-gray-900">{{ $result->vessel_name ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">VOY NO.</span>
                        <span class="font-medium text-gray-900">{{ $result->voy_number ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Terminal</span>
                        <span class="font-medium text-gray-900">{{ $result->terminal ? $result->terminal->name : 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">ETA {{ strtoupper(substr($origin, 0, 3)) }} </span>
                        <span class="font-medium text-gray-900">{{ $result->eta_jea ? $result->eta_jea->format('Y-m-d') : 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">ETA {{ strtoupper(substr($destination, 0, 3)) }} </span>
                        <span class="font-medium text-gray-900">{{ $result->eta_kict ? $result->eta_kict->format('Y-m-d') : 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Remarks</span>
                        <span class="font-medium text-gray-900">{{ $result->remarks ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        @endforeach
        
        @foreach ($containerTrackingResults as $result2)
            <div class="border border-gray-200 rounded-lg mb-4">
                <!-- Summary Section -->
                <div class="flex justify-between items-center px-4 py-3 bg-gray-50">
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">WK</span>
                        <span class="font-medium text-gray-900">{{ $result2->wk_number ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">VSL/VOY</span>
                        <span class="font-medium text-gray-900">{{ $result2->vsl_voy ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">ROT NO.</span>
                        <span class="font-medium text-gray-900">{{ $result2->rot_number ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">AEJEA</span>
                        <span class="font-medium text-gray-900">{{ $result2->aejea ? $result2->aejea->format('Y-m-d') : 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">QICT</span>
                        <span class="font-medium text-gray-900">{{ $result2->qict ? $result2->qict->format('Y-m-d') : 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">PICT KGTL</span>
                        <span class="font-medium text-gray-900">{{ $result2->pict_kgtl ? $result2->pict_kgtl->format('Y-m-d') : 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Remarks</span>
                        <span class="font-medium text-gray-900">{{ $result2->remarks ?? 'N/A' }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500">Final Loadlist Deadline</span>
                        <span class="font-medium text-gray-900">{{ $result2->final_loadlist_deadline ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
