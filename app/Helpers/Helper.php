<?php

use App\Models\PageSetting;
use App\Models\Setting;

if (!function_exists('settings')) {
    function settings() {
        $settings = Setting::first();
        return $settings;
    }
}

if (!function_exists('getPageName')) {
    function getPageName() {
        $pageSlug = request()->segment(count(request()->segments()));
        $pageSetting = PageSetting::where("slug",$pageSlug)->first();
        
        if($pageSetting){
            return $pageSetting->title;
        }
        
        return ucwords(str_replace('-', ' ', $pageSlug));
    }
}

if (!function_exists('generateBreadcrumbs')) {
    function generateBreadcrumbs()
    {
        $segments = request()->segments();
        $breadcrumbs = [];
        $url = '';

        foreach ($segments as $key => $segment) {
            $url .= '/' . $segment;
            $breadcrumbs[] = [
                'name' => ucfirst(str_replace('-', ' ', $segment)),
                'url' => url($url)
            ];
        }

        return $breadcrumbs;
    }
}
