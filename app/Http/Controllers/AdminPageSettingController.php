<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageSettingController extends Controller
{
    public function index($slug){
        $page = Page::with('pageContent')->where('slug', $slug)->first();

        return view('admin.pages.index', compact('page'));
    }
    
    public function update(Request $request, $slug){

        $credentials = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'content' => 'nullable|array',
        ]);

        $page = Page::with('pageContent')->where('slug', $slug)->first();

        $page->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', "Updated page content!");
    }
}
