@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Blogs</h3>
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Add Blog</a>
        </div>
        <div class="block-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration + ($blogs->currentPage() - 1) * $blogs->perPage() }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->slug }}</td>
                        <td>{{ $blog->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.blogs.edit', $blog->slug) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.blogs.delete', $blog->slug) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
