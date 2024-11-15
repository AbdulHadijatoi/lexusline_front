<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogContent;
use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Http\Request;

class BlogAdminController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::with('blogContents')->orderBy('id', 'DESC')->paginate(10); // Fetch 10 blogs per page
        return view('admin.blogs.index', compact('blogs'));
    }


    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contents.*.title' => 'nullable|string|max:255',
            'contents.*.description' => 'required|string',
            'contents.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store main blog details
        $blog = Blog::create([
            'title' => $validated['title'],
            'slug' => \Str::slug($validated['title']),
            'description' => $validated['description'],
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'image' => $request->hasFile('image') ? $request->file('image')->store('blogs') : null,
        ]);

        // Store blog content sections
        if(isset($validated['contents']) && $validated['contents']){
            foreach ($validated['contents'] as $content) {
                $contentData = [
                    'blog_id' => $blog->id,
                    'title' => $content['title'] ?? null,
                    'description' => $content['description'],
                    'image' => isset($content['image']) && $content['image'] ? $content['image']->store('blogs/contents') : null,
                ];
    
                // Insert content into the blog_contents table
                BlogContent::create($contentData);
            }
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }




    public function edit($slug)
    {
        $blog = Blog::with('blogContents')->where('slug', $slug)->firstOrFail();
        return view('admin.blogs.edit', compact('blog'));
    }


    
    public function update(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Update main blog details
        $blog->update($request->only(['title', 'description', 'meta_title', 'meta_description', 'meta_keywords']));

        // Handle blog image
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('images/blogs');
            $blog->save();
        }

        // Get all existing section IDs for the blog
        $existingSectionIds = $blog->blogContents->pluck('id')->toArray();

        // Extract section IDs from the request
        $inputSectionIds = collect($request->input('contents', []))->pluck('id')->filter()->toArray();

        // Find IDs to delete (present in DB but not in the request)
        $idsToDelete = array_diff($existingSectionIds, $inputSectionIds);

        // Delete the removed sections
        if (!empty($idsToDelete)) {
            BlogContent::whereIn('id', $idsToDelete)->delete();
        }

        // Loop through sections in the request
        if($request->contents){
            foreach ($request->contents as $contentData) {
                if (!empty($contentData['id'])) {
                    // Update existing section
                    $section = BlogContent::findOrFail($contentData['id']);
                    $section->update([
                        'title' => $contentData['title'],
                        'description' => $contentData['description'],
                    ]);
    
                    // Handle section image
                    if (!empty($contentData['image'])) {
                        $section->image = $contentData['image']->store('images/blogs/contents');
                        $section->save();
                    }
                } else {
                    // Create a new section
                    $blog->blogContents()->create([
                        'title' => $contentData['title'],
                        'description' => $contentData['description'],
                        'image' => !empty($contentData['image']) ? $contentData['image']->store('images/blogs/contents') : null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }




    public function delete($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blog->delete(); // Soft delete
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }

}
