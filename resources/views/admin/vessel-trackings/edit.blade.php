@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Vessel Tracking</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.vessel-trackings.update', $vesselTracking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="rot_number">Rot Number</label>
                    <input type="text" name="rot_number" id="rot_number" class="form-control" value="{{ $vesselTracking->rot_number }}" required>
                </div>
                <div class="form-group">
                    <label for="vessel_name">Vessel Name</label>
                    <input type="text" name="vessel_name" id="vessel_name" class="form-control" value="{{ $vesselTracking->vessel_name }}" required>
                </div>
                <div class="form-group">
                    <label for="voy_number">Voyage Number</label>
                    <input type="text" name="voy_number" id="voy_number" class="form-control" value="{{ $vesselTracking->voy_number }}" required>
                </div>
                <div class="form-group">
                    <label for="origin_port_id">Select Origin Port</label>
                    <select name="origin_port_id" id="origin_port_id" class="form-control" required>
                        @foreach ($ports as $port)
                            <option value="{{ $port->id }}" {{ $port->id == $vesselTracking->origin_port_id ? 'selected' : '' }}>
                                {{ $port->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="destination_port_id">Select Destination Port</label>
                    <select name="destination_port_id" id="destination_port_id" class="form-control" required>
                        @foreach ($ports as $port)
                            <option value="{{ $port->id }}" {{ $port->id == $vesselTracking->destination_port_id ? 'selected' : '' }}>
                                {{ $port->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="terminal_id">Terminal ID</label>
                    <select name="terminal_id" id="terminal_id" class="form-control" required>
                        @foreach ($terminals as $terminal)
                            <option value="{{ $terminal->id }}" {{ $terminal->id == $vesselTracking->terminal_id ? 'selected' : '' }}>
                                {{ $terminal->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="eta_jea">ETA JEA</label>
                    <input type="date" name="eta_jea" id="eta_jea" class="form-control" value="{{ $vesselTracking->eta_jea }}" required>
                </div>
                <div class="form-group">
                    <label for="eta_kict">ETA KICT</label>
                    <input type="date" name="eta_kict" id="eta_kict" class="form-control" value="{{ $vesselTracking->eta_kict }}" required>
                </div>
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea name="remarks" id="remarks" class="form-control">{{ $vesselTracking->remarks }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.vessel-trackings.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
