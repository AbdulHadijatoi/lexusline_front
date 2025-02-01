<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller {
    
    public function homePage() {
        $page = Page::with('pageContents')->where("slug",'/')->first();
        
        $pageContents = null;
        if($page){
            $pageContents = $page->pageContents;
        }

        $blogs = Blog::latest('id')->limit(5)->get();
        // dd($pageContents->toArray());
        return view('home-page', compact('pageContents','blogs'));
    }
    
    public function CommonPage() {
        $data = [];
        return view('common-page', $data);
    }
    
    public function whoWeAre()
    {
        $data = [];
        return view('pages.who-we-are', $data);
    }

    public function dryCargo()
    {
        $data = [];
        return view('pages.dry-cargo', $data);
    }

    public function reeferCargo()
    {
        $data = [];
        return view('pages.reefer-cargo', $data);
    }

    public function liquidCargo()
    {
        $data = [];
        return view('pages.liquid-cargo', $data);
    }

    public function projectCargo()
    {
        $data = [];
        return view('pages.project-cargo', $data);
    }

    public function containerHaulage()
    {
        $data = [];
        return view('pages.container-haulage', $data);
    }

    public function contactUs()
    {
        $data = [];
        return view('pages.contact-us', $data);
    }

    public function automotiveShipping()
    {
        $data = [];
        return view('pages.automotive-shipping', $data);
    }

    public function dangerousGoodShipping()
    {
        $data = [];
        return view('pages.dangerous-good-shipping', $data);
    }

    public function cargoStorageSolutions()
    {
        $data = [];
        return view('pages.cargo-storage-solutions', $data);
    }

    public function exworksSolutions()
    {
        $data = [];
        return view('pages.exworks-solutions', $data);
    }

    public function containerTrading()
    {
        $data = [];
        return view('pages.container-trading', $data);
    }

    public function containerBlTracking()
    {
        $data = [];
        return view('pages.container-bl-tracking', $data);
    }

    public function clientRegLogin()
    {
        $data = [];
        return view('pages.client-reg-login', $data);
    }

    public function freightRate()
    {
        $data = [];
        return view('pages.freight-rate', $data);
    }

    public function getQuote()
    {
        $data = [];
        return view('pages.get-quote', $data);
    }

    public function generalTariff()
    {
        $data = [];
        return view('pages.general-tariff', $data);
    }

    public function quickPayment()
    {
        $data = [];
        return view('pages.quick-payment', $data);
    }

    public function termsConditions()
    {
        $data = [];
        return view('pages.terms-conditions', $data);
    }
    
    public function privacyPolicy()
    {
        $data = [];
        return view('pages.privacy-policy', $data);
    }

    public function blogsNews()
    {
        $data = [];
        return view('pages.blogs-news', $data);
    }
    
    public function blogsDetails()
    {
        $data = [];
        return view('pages.blog-details', $data);
    }
}
