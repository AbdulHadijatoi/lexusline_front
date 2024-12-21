<?php

namespace App\Http\Controllers;

use App\Models\ContainerTracking;
use App\Models\Port;
use App\Models\VesselDetail;
use App\Models\VesselTracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{

    public function containerTracking(Request $request)
    {
        $container_number = $request->input('container_number');

        // Fetch Vessel Tracking and Container Tracking, eager load related Ports
        $trackingResults = ContainerTracking::where('container_number', 'like', "%$container_number%")
                                    ->orWhere('bl_number', 'like', "%$container_number%")
                                    ->get();

        

        return view('pages.container-bl-tracking', compact('trackingResults', 'container_number'));
    }

    public function searchPort(Request $request)
    {
        $query = $request->input('query');
        $ports = Port::where('name', 'like', "%$query%")
            ->limit(10)  // Limit the number of suggestions
            ->get(['id', 'name']);  // Return only the relevant fields

        return response()->json($ports);
    }
}
