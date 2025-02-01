<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageContent;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function edit()
    {
        $page = Page::with('pageContents')->where('slug', '/')->first();
        $settings = Setting::first(); // Assuming there is only one settings row
        return view('admin.settings.edit', compact('settings','page'));
    }

    public function update(Request $request){

        $settings = Setting::first(); // Get the first row of settings
        $validatedData = $request->validate([
            'hero_image' => 'nullable|image', // Validate image
            'hero_title' => 'nullable',
            'hero_text' => 'nullable',
            'hero_btn_text' => 'nullable',
            'footer_text' => 'nullable',
            // 'home_section_1_text' => 'nullable',
            // 'home_insights_text' => 'nullable',
            'choose_us_text' => 'nullable',

            'contents' => 'nullable|array',
            'contents.*.description' => 'required|string',
            'contents.*.title' => 'nullable|string',
            'contents.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Handle image upload if exists
        $imagePath = null;
        if ($request->hasFile('hero_image')) {
            $imagePath = $request->file('hero_image')->store('uploads/settings', 'public');
        }

        $data = [
            'hero_title' => $request->hero_title,
            'hero_text' => $request->hero_text,
            'hero_btn_text' => $request->hero_btn_text,
            'footer_text' => $request->footer_text,
            'choose_us_text' => $request->choose_us_text,
        ];
        
        if($imagePath){
            $data['hero_image'] = $imagePath;
        }

        $settings->update($data); // Update settings

        // Fetch the page with its contents
        $page = Page::with('pageContents')->where('slug', '/')->firstOrFail();

        // Process each content section
        $existingContentIds = $page->pageContents->pluck('id')->toArray();
        $updatedContentIds = [];

        foreach ($request->contents as $contentData) {
            if (isset($contentData['id'])) {
                // Update existing content
                $content = PageContent::find($contentData['id']);
                if ($content) {
                    $content->update([
                        'title' => $contentData['title'] ?? null,
                        'description' => $contentData['description'],
                        'image' => isset($contentData['image']) ? $contentData['image']->store('page_contents') : $content->image,
                    ]);
                    $updatedContentIds[] = $content->id;
                }
            } else {
                // Create new content
                $page->pageContent()->create([
                    'title' => $contentData['title'] ?? null,
                    'description' => $contentData['description'],
                    'image' => isset($contentData['image']) ? $contentData['image']->store('page_contents') : null,
                ]);
            }
        }

        // Remove deleted contents
        $toDelete = array_diff($existingContentIds, $updatedContentIds);
        if (!empty($toDelete)) {
            PageContent::whereIn('id', $toDelete)->delete();
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

}
