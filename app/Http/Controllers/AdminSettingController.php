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
        $settings = Setting::first(); // Assuming there is only one settings row
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request){
        $settings = Setting::first(); // Get the first row of settings
        $validatedData = $request->validate([
            'hero_image' => 'nullable|image|max:2048', // Validate image
            'hero_title' => 'nullable|string|max:255',
            'hero_text' => 'nullable|string|max:255',
            'hero_btn_text' => 'nullable|string|max:255',
            'footer_text' => 'nullable|string|max:255',
            'home_section_1_text' => 'nullable|string|max:255',
            'home_insights_text' => 'nullable|string|max:255',
            'choose_us_text' => 'nullable|string|max:255',
        ]);

        // Handle image upload if exists
        if ($request->hasFile('hero_image')) {
            $imagePath = $request->file('hero_image')->store('uploads/settings', 'public');
            $validatedData['hero_image'] = $imagePath;
        }

        $settings->update($validatedData); // Update settings
        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

}
