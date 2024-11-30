@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Ports</h3>
            <a href="{{ route('admin.ports.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Port Name</th>
                            <th>Location</th>
                            <th>Country</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ports as $port)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $port->name }}</td>
                                <td>{{ $port->location }}</td>
                                <td>{{ $port->country }}</td>
                                <td>
                                    <a href="{{ route('admin.ports.edit', $port->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.ports.destroy', $port->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this port?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Ports Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
