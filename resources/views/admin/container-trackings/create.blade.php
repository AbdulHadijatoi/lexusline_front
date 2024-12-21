@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add New Container Tracking</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.container-trackings.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="container_number">Container Number</label>
                    <input type="text" name="container_number" id="container_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="bl_number">BL Number</label>
                    <input type="text" name="bl_number" id="bl_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="origin_port_id">Select Port of Load</label>
                    <select name="origin_port_id" id="origin_port_id" class="form-control" required>
                        @foreach ($ports as $port)
                            <option value="{{ $port->id }}">
                                {{ $port->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="destination_port_id">Select Port of Discharge</label>
                    <select name="destination_port_id" id="destination_port_id" class="form-control" required>
                        @foreach ($ports as $port)
                            <option value="{{ $port->id }}">
                                {{ $port->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="container_details">Container Details</label>
                    <textarea name="container_details" id="container_details" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="bl_details">BL Details</label>
                    <textarea name="bl_details" id="bl_details" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea name="remarks" id="remarks" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.container-trackings.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
