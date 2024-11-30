@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Container Tracking</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.container-trackings.update', $containerTracking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="wk_number">WK Number</label>
                    <input type="text" name="wk_number" id="wk_number" class="form-control" value="{{ $containerTracking->wk_number }}" required>
                </div>
                <div class="form-group">
                    <label for="origin_port_id">Select Origin Port</label>
                    <select name="origin_port_id" id="origin_port_id" class="form-control" required>
                        @foreach ($ports as $port)
                            <option value="{{ $port->id }}" {{ $port->id == $containerTracking->origin_port_id ? 'selected' : '' }}>
                                {{ $port->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="destination_port_id">Select Destination Port</label>
                    <select name="destination_port_id" id="destination_port_id" class="form-control" required>
                        @foreach ($ports as $port)
                            <option value="{{ $port->id }}" {{ $port->id == $containerTracking->destination_port_id ? 'selected' : '' }}>
                                {{ $port->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="vsl_voy">Vessel Voyage</label>
                    <input type="text" name="vsl_voy" id="vsl_voy" class="form-control" value="{{ $containerTracking->vsl_voy }}">
                </div>
                <div class="form-group">
                    <label for="rot_number">ROT Number</label>
                    <input type="text" name="rot_number" id="rot_number" class="form-control" value="{{ $containerTracking->rot_number }}">
                </div>
                <div class="form-group">
                    <label for="aejea">AE JEA</label>
                    <input type="date" name="aejea" id="aejea" class="form-control" value="{{ $containerTracking->aejea }}">
                </div>
                <div class="form-group">
                    <label for="qict">QICT</label>
                    <input type="date" name="qict" id="qict" class="form-control" value="{{ $containerTracking->qict }}">
                </div>
                <div class="form-group">
                    <label for="pict_kgtl">PICT KGTL</label>
                    <input type="date" name="pict_kgtl" id="pict_kgtl" class="form-control" value="{{ $containerTracking->pict_kgtl }}">
                </div>
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea name="remarks" id="remarks" class="form-control">{{ $containerTracking->remarks }}</textarea>
                </div>
                <div class="form-group">
                    <label for="final_loadlist_deadline">Final Loadlist Deadline</label>
                    <input type="text" name="final_loadlist_deadline" id="final_loadlist_deadline" class="form-control" value="{{ $containerTracking->final_loadlist_deadline }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.container-trackings.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
