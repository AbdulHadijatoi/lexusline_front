@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Container Trackings</h3>
            <a href="{{ route('admin.container-trackings.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Port of Load</th>
                            <th>Port of Discharge</th>
                            <th>Container Number</th>
                            <th>BL Number</th>
                            <th>Date</th>
                            <th>Container Details</th>
                            <th>BL Details</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($containerTrackings as $tracking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tracking->container_number }}</td>
                                <td>{{ $tracking->originPort->name ?? 'N/A' }}</td>
                                <td>{{ $tracking->destinationPort->name ?? 'N/A' }}</td>
                                <td>{{ $tracking->bl_number }}</td>
                                <td>{{ $tracking->date }}</td>
                                <td>{{ $tracking->container_details ?? 'N/A' }}</td>
                                <td>{{ $tracking->bl_details ?? 'N/A' }}</td>
                                <td>{{ $tracking->remarks ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.container-trackings.edit', $tracking->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.container-trackings.destroy', $tracking->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">No Container Tracking Records Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
