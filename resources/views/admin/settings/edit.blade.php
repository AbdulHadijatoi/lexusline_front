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

                <!-- Home Section 1 Text -->
                <div class="form-group mb-4">
                    <label for="home_section_1_text">Home Section 1 Text</label>
                    <input type="text" name="home_section_1_text" id="home_section_1_text" class="form-control" value="{{ $settings->home_section_1_text }}">
                </div>

                <!-- Home Insights Text -->
                <div class="form-group mb-4">
                    <label for="home_insights_text">Home Insights Text</label>
                    <input type="text" name="home_insights_text" id="home_insights_text" class="form-control" value="{{ $settings->home_insights_text }}">
                </div>

                <!-- Choose Us Text -->
                <div class="form-group mb-4">
                    <label for="choose_us_text">Choose Us Text</label>
                    <input type="text" name="choose_us_text" id="choose_us_text" class="form-control" value="{{ $settings->choose_us_text }}">
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Settings</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
