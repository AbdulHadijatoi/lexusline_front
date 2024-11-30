<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{
    public function index()
    {
        $ports = Port::all();
        return view('admin.ports.index', compact('ports'));
    }

    public function create()
    {
        return view('admin.ports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'country' => 'required|string',
        ]);

        Port::create($request->all());
        return redirect()->route('admin.ports.index')->with('success', 'Port created successfully.');
    }

    public function edit($id)
    {
        $port = Port::findOrFail($id);
        return view('admin.ports.edit', compact('port'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'country' => 'required|string',
        ]);

        $port = Port::findOrFail($id);
        $port->update($request->all());
        return redirect()->route('admin.ports.index')->with('success', 'Port updated successfully.');
    }

    public function destroy($id)
    {
        $port = Port::findOrFail($id);
        $port->delete();
        return redirect()->route('admin.ports.index')->with('success', 'Port deleted successfully.');
    }

}
