@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Update Settings</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Hero Image -->
                <div class="form-group mb-4">
                    <label for="hero_image">Home Hero Image</label>
                    <input type="file" name="hero_image" id="hero_image" class="form-control">
                    @if($settings->hero_image)
                        <img src="{{ $settings->image_url }}" alt="Hero Image" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>

                <!-- Hero Title -->
                <div class="form-group mb-4">
                    <label for="hero_title">Home Hero Title</label>
                    <input type="text" name="hero_title" id="hero_title" class="form-control" value="{{ $settings->hero_title }}">
                </div>

                <!-- Hero Text -->
                <div class="form-group mb-4">
                    <label for="hero_text">Home Hero Text</label>
                    <input type="text" name="hero_text" id="hero_text" class="form-control" value="{{ $settings->hero_text }}">
                </div>

                <!-- Hero Button Text -->
                <div class="form-group mb-4">
                    <label for="hero_btn_text">Home Hero Button Text</label>
                    <input type="text" name="hero_btn_text" id="hero_btn_text" class="form-control" value="{{ $settings->hero_btn_text }}">
                </div>

                <!-- Footer Text -->
                <div class="form-group mb-4">
                    <label for="footer_text">Footer Text</label>
                    <input type="text" name="footer_text" id="footer_text" class="form-control" value="{{ $settings->footer_text }}">
                </div>

                <!-- Choose Us Text -->
                <div class="form-group mb-4">
                    <label for="choose_us_text">Choose Us Text</label>
                    <input type="text" name="choose_us_text" id="choose_us_text" class="form-control" value="{{ $settings->choose_us_text }}">
                </div>

                

                <br>
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
                    <button type="button" id="add-section" class="btn btn-primary">Add Content Section</button>
                </div>

                <!-- Submit Button -->
                <div class="form-group my-4">
                    <button type="submit" class="btn btn-success">Update Settings</button>
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
