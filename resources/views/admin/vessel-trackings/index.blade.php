@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Vessel Trackings</h3>
            <a href="{{ route('admin.vessel-trackings.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rot Number</th>
                            <th>Vessel Name</th>
                            <th>Voyage Number</th>
                            <th>Departure Port</th>
                            <th>Arrival Port</th>
                            <th>Terminal ID</th>
                            <th>ETA JEA</th>
                            <th>ETA KICT</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vesselTrackings as $tracking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tracking->rot_number }}</td>
                                <td>{{ $tracking->vessel_name }}</td>
                                <td>{{ $tracking->voy_number }}</td>
                                <td>{{ $tracking->originPort->name ?? 'N/A' }}</td>
                                <td>{{ $tracking->destinationPort->name ?? 'N/A' }}</td>
                                <td>{{ $tracking->terminal_id }}</td>
                                <td>{{ $tracking->eta_jea }}</td>
                                <td>{{ $tracking->eta_kict }}</td>
                                <td>{{ $tracking->remarks ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.vessel-trackings.edit', $tracking->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.vessel-trackings.destroy', $tracking->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">No Vessel Tracking Records Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
