@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add/Update Page Content</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.pageSetting.update', $page->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Page Title -->
                <div class="mb-4">
                    <label for="title" class="form-label font-weight-bold">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}">
                </div>

                <!-- Page Subtitle -->
                <div class="mb-4">
                    <label for="description" class="form-label font-weight-bold">Sub Title</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $page->description }}">
                </div>

                <!-- Section Container -->
                <div id="sections-container">
                    @foreach($page->pageContents as $index => $content)
                    <div class="section-content bg-light p-4 rounded mb-4" data-index="{{ $index }}">
                        <h5 class="mb-3 font-weight-bold">Section {{ $index + 1 }}</h5>

                        <input type="hidden" name="contents[{{ $index }}][id]" value="{{ $content->id }}">

                        <!-- Section Title -->
                        <div class="mb-3">
                            <label for="contents[{{ $index }}][title]" class="form-label">Section Title</label>
                            <input type="text" class="form-control" name="contents[{{ $index }}][title]" value="{{ $content->title }}">
                        </div>

                        <!-- Section Description -->
                        <div class="mb-3">
                            <label for="contents[{{ $index }}][description]" class="form-label">Section Description</label>
                            <textarea name="contents[{{ $index }}][description]" class="form-control editor">{{ $content->description }}</textarea>
                        </div>

                        <!-- Section Image -->
                        <div class="mb-3">
                            <label for="contents[{{ $index }}][image]" class="form-label">Section Image</label>
                            <input type="file" class="form-control" name="contents[{{ $index }}][image]">
                        </div>

                        @if($content->image)
                            <img src="{{ asset('storage/' . $content->image) }}" alt="Content Image" width="100" class="mt-2">
                        @endif

                        <!-- Delete Section Button -->
                        <button type="button" class="btn btn-danger remove-section mt-2">Delete Section</button>
                    </div>
                    @endforeach
                </div>

                <!-- Add Section Button -->
                <div class="d-flex justify-content-end">
                    <button type="button" id="add-section" class="btn btn-primary">Add Section</button>
                </div>

                <!-- Save Button -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success w-100">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Function to initialize CKEditor 5 on all textareas with the class 'editor'
    function initializeCKEditor() {
        document.querySelectorAll('textarea.editor').forEach(textarea => {
            if (!textarea.classList.contains('ck-editor-initialized')) {
                ClassicEditor.create(textarea)
                    .then(editor => {
                        textarea.editorInstance = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
                textarea.classList.add('ck-editor-initialized');
            }
        });
    }

    document.getElementById('add-section').addEventListener('click', function () {
        let index = document.querySelectorAll('.section-content').length;
        let sectionHTML = `
            <div class="section-content bg-light p-4 rounded mb-4" data-index="${index}">
                <h5 class="mb-3 font-weight-bold">Section ${index + 1}</h5>
                <label for="contents[${index}][title]" class="form-label">Section Title</label>
                <input type="text" class="form-control mb-3" name="contents[${index}][title]">
                <label for="contents[${index}][description]" class="form-label">Section Description</label>
                <textarea name="contents[${index}][description]" class="form-control editor mb-3"></textarea>
                <label for="contents[${index}][image]" class="form-label">Section Image</label>
                <input type="file" class="form-control mb-3" name="contents[${index}][image]">
                <button type="button" class="btn btn-danger remove-section">Delete Section</button>
            </div>
        `;
        document.getElementById('sections-container').insertAdjacentHTML('beforeend', sectionHTML);

        // Re-initialize CKEditor on all .editor textareas
        initializeCKEditor();
        addRemoveEvent();
    });

    // Event to handle removing a section
    function addRemoveEvent() {
        document.querySelectorAll('.remove-section').forEach(button => {
            button.addEventListener('click', function () {
                const section = this.closest('.section-content');
                const textarea = section.querySelector('.editor');

                // Destroy CKEditor instance before removing the section
                if (textarea.editorInstance) {
                    textarea.editorInstance.destroy()
                        .then(() => section.remove())
                        .catch(error => console.error(error));
                } else {
                    section.remove();
                }
            });
        });
    }

    // Initialize CKEditor on page load for existing textareas
    initializeCKEditor();
    addRemoveEvent();
</script>
@endsection
