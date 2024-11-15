@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Create Blog</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                </div>
                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <input type="text" class="form-control" id="meta_description" name="meta_description" value="{{ old('meta_description') }}">
                </div>
                <div class="mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords') }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div id="sections-container">
                    <!-- Sections will be dynamically added here -->
                </div>
                <button type="button" id="add-section" class="btn btn-primary mt-3">Add Section</button>
                <button type="submit" class="btn btn-success mt-3">Create</button>
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

    // Event to handle adding a new section
    document.getElementById('add-section').addEventListener('click', function () {
        let index = document.querySelectorAll('.section-content').length;
        let sectionHTML = `
            <div class="section-content mb-4 bg-light p-4 rounded" data-index="${index}">
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

        // Re-initialize CKEditor on newly added textarea
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
