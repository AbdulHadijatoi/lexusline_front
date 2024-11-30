@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add New Port</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.ports.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Port Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.ports.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection