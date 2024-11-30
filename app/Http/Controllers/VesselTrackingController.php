<?php

namespace App\Http\Controllers;

use App\Models\VesselTracking;
use App\Models\Port;
use App\Models\Terminal;
use Illuminate\Http\Request;

class VesselTrackingController extends Controller
{
    public function index()
    {
        $vesselTrackings = VesselTracking::with(['originPort', 'destinationPort', 'terminal'])->get();
        return view('admin.vessel-trackings.index', compact('vesselTrackings'));
    }

    public function create()
    {
        $ports = Port::all();
        $terminals = Terminal::all();
        return view('admin.vessel-trackings.create', compact('ports', 'terminals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'origin_port_id' => 'required|exists:ports,id',
            'destination_port_id' => 'required|exists:ports,id',
            'rot_number' => 'required|string|max:255',
            'vessel_name' => 'nullable|string|max:255',
            'voy_number' => 'nullable|string|max:255',
            'terminal_id' => 'nullable|exists:terminals,id',
            'eta_jea' => 'nullable|date',
            'eta_kict' => 'nullable|date',
            'remarks' => 'nullable|string',
        ]);

        VesselTracking::create($request->all());

        return redirect()->route('admin.vessel-trackings.index')->with('success', 'Vessel Tracking created successfully.');
    }

    public function edit(VesselTracking $vesselTracking)
    {
        $ports = Port::all();
        $terminals = Terminal::all();
        return view('admin.vessel-trackings.edit', compact('vesselTracking', 'ports', 'terminals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'origin_port_id' => 'required|exists:ports,id',
            'destination_port_id' => 'required|exists:ports,id',
            'rot_number' => 'required|string|max:255',
            'vessel_name' => 'nullable|string|max:255',
            'voy_number' => 'nullable|string|max:255',
            'terminal_id' => 'nullable|exists:terminals,id',
            'eta_jea' => 'nullable|date',
            'eta_kict' => 'nullable|date',
            'remarks' => 'nullable|string',
        ]);

        $vesselTracking = VesselTracking::findOrFail($id);
        $vesselTracking->update($request->all());

        return redirect()->route('admin.vessel-trackings.index')->with('success', 'Vessel Tracking updated successfully.');
    }


    public function destroy(VesselTracking $vesselTracking)
    {
        $vesselTracking->delete();
        return redirect()->route('admin.vessel-trackings.index')->with('success', 'Vessel tracking deleted successfully.');
    }
}

