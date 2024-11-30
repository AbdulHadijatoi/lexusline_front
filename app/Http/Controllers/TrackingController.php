<?php

namespace App\Http\Controllers;

use App\Models\ContainerTracking;
use App\Models\Port;
use App\Models\VesselDetail;
use App\Models\VesselTracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{

    public function vesselSchedule(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');

        // Fetch Vessel Tracking and Container Tracking, eager load related Ports
        $vesselTrackingResults = VesselTracking::with(['originPort', 'destinationPort'])
            ->whereHas('originPort', function ($q) use($origin){
                $q->where('name', 'like', "%$origin%");
            })
            ->whereHas('destinationPort', function ($q) use($destination){
                $q->where('name', 'like', "%$destination%");
            })
            ->get();

        $containerTrackingResults = ContainerTracking::with(['originPort', 'destinationPort'])
            ->whereHas('originPort', function ($q) use($origin){
                $q->where('name', 'like', "%$origin%");
            })
            ->whereHas('destinationPort', function ($q) use($destination){
                $q->where('name', 'like', "%$destination%");
            })
            ->get();

        return view('pages.vessel_schedule', compact('vesselTrackingResults', 'containerTrackingResults', 'origin', 'destination'));
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
