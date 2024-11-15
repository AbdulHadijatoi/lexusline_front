<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageSettingController extends Controller
{
    public function index($slug){
        $page = Page::with('pageContents')->where('slug', $slug)->first();

        return view('admin.pages.index', compact('page'));
    }
    
    public function update(Request $request, $slug)
    {
        // Validate main page fields and page contents array
        $credentials = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'contents' => 'nullable|array',
            'contents.*.description' => 'required|string',
            'contents.*.title' => 'nullable|string',
            'contents.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Fetch the page with its contents
        $page = Page::with('pageContents')->where('slug', $slug)->firstOrFail();

        // Update page's main fields
        $page->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

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

        return redirect()->back()->with('success', "Updated page content!");
    }

}
