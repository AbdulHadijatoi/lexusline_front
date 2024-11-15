@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Subscribers</h3>
        </div>
        <div class="block-content">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Subscribed At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscribers as $subscriber)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td>{{ $subscriber->created_at->format('d M Y, h:i A') }}</td>
                            <td>
                                <form action="{{ route('admin.subscribers.destroy', $subscriber) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No subscribers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $subscribers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
