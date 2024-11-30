<?php

namespace App\Http\Controllers;

use App\Models\ContainerTracking;
use App\Models\Port;
use App\Models\VesselDetail;
use Illuminate\Http\Request;

class ContainerTrackingController extends Controller
{
    // Index - Show all container trackings
    public function index()
    {
        $containerTrackings = ContainerTracking::with(['originPort', 'destinationPort'])->get();
        return view('admin.container-trackings.index', compact('containerTrackings'));
    }

    // Create - Show form for adding a new container tracking
    public function create()
    {
        $ports = Port::all();
        return view('admin.container-trackings.create', compact('ports'));
    }

    // Store - Save a new container tracking
    public function store(Request $request)
    {
        $request->validate([
            'origin_port_id' => 'required|exists:ports,id',
            'destination_port_id' => 'required|exists:ports,id',
            'wk_number' => 'required|string|max:255',
            'vsl_voy' => 'required|string|max:255',
            'rot_number' => 'required|string|max:255',
            'aejea' => 'nullable|string|max:255',
            'qict' => 'nullable|string|max:255',
            'pict_kgtl' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',
            'final_loadlist_deadline' => 'nullable|string|max:255',
        ]);

        ContainerTracking::create($request->all());

        return redirect()->route('admin.container-trackings.index')->with('success', 'Container Tracking created successfully.');
    }


    // Edit - Show form for editing a container tracking
    public function edit(ContainerTracking $containerTracking)
    {
        $ports = Port::all();
        return view('admin.container-trackings.edit', compact('containerTracking', 'ports'));
    }

    // Update - Save changes to an existing container tracking
    public function update(Request $request, $id)
    {
        $request->validate([
            'origin_port_id' => 'required|exists:ports,id',
            'destination_port_id' => 'required|exists:ports,id',
            'wk_number' => 'required|string|max:255',
            'vsl_voy' => 'required|string|max:255',
            'rot_number' => 'required|string|max:255',
            'aejea' => 'nullable|string|max:255',
            'qict' => 'nullable|string|max:255',
            'pict_kgtl' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',
            'final_loadlist_deadline' => 'nullable|string|max:255',
        ]);

        $containerTracking = ContainerTracking::findOrFail($id);
        $containerTracking->update($request->all());

        return redirect()->route('admin.container-trackings.index')->with('success', 'Container Tracking updated successfully.');
    }


    // Destroy - Delete a container tracking
    public function destroy(ContainerTracking $containerTracking)
    {
        $containerTracking->delete();

        return redirect()->route('admin.container-trackings.index')->with('success', 'Container tracking deleted successfully.');
    }

    public function search(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');

        $trackingResults = ContainerTracking::where('origin', 'like', "%$origin%")
            ->where('destination', 'like', "%$destination%")
            ->get();

        return view('pages.container_tracking', compact('trackingResults'));
    }

    public function getVesselDetails($id)
    {
        $tracking = ContainerTracking::with('vesselDetails')->findOrFail($id);
        return response()->json($tracking->vesselDetails);
    }
}
