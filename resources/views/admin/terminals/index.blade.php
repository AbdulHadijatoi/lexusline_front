@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Terminals</h3>
            <a href="{{ route('admin.terminals.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Terminal Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($terminals as $terminal)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $terminal->name }}</td>
                                <td>
                                    <a href="{{ route('admin.terminals.edit', $terminal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.terminals.destroy', $terminal->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this terminal?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Terminals Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
