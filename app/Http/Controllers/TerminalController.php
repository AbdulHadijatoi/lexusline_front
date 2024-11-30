<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    public function index()
    {
        $terminals = Terminal::all();
        return view('admin.terminals.index', compact('terminals'));
    }

    public function create()
    {
        return view('admin.terminals.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Terminal::create($request->all());
        return redirect()->route('admin.terminals.index')->with('success', 'Terminal created successfully.');
    }

    public function edit(Terminal $terminal)
    {
        return view('terminals.edit', compact('terminal'));
    }

    public function update(Request $request, Terminal $terminal)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $terminal->update($request->all());
        return redirect()->route('admin.terminals.index')->with('success', 'Terminal updated successfully.');
    }

    public function destroy(Terminal $terminal)
    {
        $terminal->delete();
        return redirect()->route('admin.terminals.index')->with('success', 'Terminal deleted successfully.');
    }
}
