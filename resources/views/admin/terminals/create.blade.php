@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add New Terminal</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.terminals.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Terminal Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.terminals.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
