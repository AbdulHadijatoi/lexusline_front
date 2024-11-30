@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add New Vessel Tracking</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.vessel-trackings.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="rot_number">Rot Number</label>
                    <input type="text" name="rot_number" id="rot_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="vessel_name">Vessel Name</label>
                    <input type="text" name="vessel_name" id="vessel_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="voy_number">Voyage Number</label>
                    <input type="text" name="voy_number" id="voy_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="origin_port_id">Select Origin Port</label>
                    <select name="origin_port_id" id="origin_port_id" class="form-control" required>
                        @foreach ($ports as $port)
                            <option value="{{ $port->id }}">{{ $port->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="destination_port_id">Select Destination Port</label>
                    <select name="destination_port_id" id="destination_port_id" class="form-control" required>
                        @foreach ($ports as $port)
                            <option value="{{ $port->id }}">{{ $port->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="terminal_id">Terminal ID</label>
                    <select name="terminal_id" id="terminal_id" class="form-control" required>
                        @foreach ($terminals as $terminal)
                            <option value="{{ $terminal->id }}">
                                {{ $terminal->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="eta_jea">ETA JEA</label>
                    <input type="date" name="eta_jea" id="eta_jea" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="eta_kict">ETA KICT</label>
                    <input type="date" name="eta_kict" id="eta_kict" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea name="remarks" id="remarks" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.vessel-trackings.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
