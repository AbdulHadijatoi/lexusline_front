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
            'container_number' => 'required|string|max:255',
            'bl_number' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'container_details' => 'nullable',
            'bl_details' => 'nullable',
            'remarks' => 'nullable|string',
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
            'container_number' => 'required|string|max:255',
            'bl_number' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'container_details' => 'nullable',
            'bl_details' => 'nullable',
            'remarks' => 'nullable|string',
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
        $container_number = $request->input('container_number');

        $trackingResults = ContainerTracking::where('container_number', 'like', "%$container_number%")
            ->orWhere('bl_number', 'like', "%$container_number%")
            ->get();

        return view('pages.container_tracking', compact('trackingResults'));
    }

}
