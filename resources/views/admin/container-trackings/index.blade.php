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
                            <th>WK Number</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Vessel Voyage</th>
                            <th>ROT Number</th>
                            <th>AE JEA</th>
                            <th>QICT</th>
                            <th>PICT KGTL</th>
                            <th>Remarks</th>
                            <th>Final Loadlist Deadline</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($containerTrackings as $tracking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tracking->wk_number }}</td>
                                <td>{{ $tracking->originPort->name ?? 'N/A' }}</td>
                                <td>{{ $tracking->destinationPort->name ?? 'N/A' }}</td>
                                <td>{{ $tracking->vsl_voy }}</td>
                                <td>{{ $tracking->rot_number }}</td>
                                <td>{{ $tracking->aejea ?? 'N/A' }}</td>
                                <td>{{ $tracking->qict ?? 'N/A' }}</td>
                                <td>{{ $tracking->pict_kgtl ?? 'N/A' }}</td>
                                <td>{{ $tracking->remarks ?? 'N/A' }}</td>
                                <td>{{ $tracking->final_loadlist_deadline ?? 'N/A' }}</td>
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
