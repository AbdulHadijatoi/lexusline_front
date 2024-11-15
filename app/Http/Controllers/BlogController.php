<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogContent;
use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Http\Request;

class BlogController extends Controller {
    public function index(Request $request) {
        $blogs = Blog::with('blogContents')->orderBy('id', 'DESC')->get(); // Fetch 10 blogs per page

        return view('pages.blogs-news', compact('blogs'));
    }


    public function create() {
        return view('admin.blogs.create');
    }

    public function show($slug) {
        $blog = Blog::with('blogContents')->where('slug', $slug)->firstOrFail();
        return view('pages.blog-details', compact('blog'));
    }

}
