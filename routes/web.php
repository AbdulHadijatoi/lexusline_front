<?php

use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogAdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContainerTrackingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageSettingController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\VesselTrackingController;
use Illuminate\Support\Facades\Route;


// if(getMenu()){
//     foreach (getMenu() as $menu) {
//         if($menu->slug == '/'){
//             Route::get("{$menu->slug}", [PageController::class, 'homePage'])->name($menu->slug);
//         }else{
//             Route::get("{$menu->slug}", [PageController::class, 'commonPage'])->name($menu->slug);
//         }
//     }
// }

// if(getMenu(2)){
//     foreach (getMenu(2) as $menu) {
//         Route::get("{$menu->slug}", [PageController::class, 'commonPage'])->name($menu->slug);
//     }
// }

Route::get('/', [PageController::class, 'homePage'])->name('home');
Route::get('/who-we-are', [PageController::class, 'whoWeAre'])->name('who-we-are');
Route::get('/dry-cargo', [PageController::class, 'dryCargo'])->name('dry-cargo');
Route::get('/reefer-cargo', [PageController::class, 'reeferCargo'])->name('reefer-cargo');
Route::get('/liquid-cargo', [PageController::class, 'liquidCargo'])->name('liquid-cargo');
Route::get('/project-cargo', [PageController::class, 'projectCargo'])->name('project-cargo');
Route::get('/container-haulage', [PageController::class, 'containerHaulage'])->name('container-haulage');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact-us');
Route::post('/subscriber', [SubscriberController::class, 'subscribe'])->name('subscribe');

Route::get('/automotive-shipping', [PageController::class, 'automotiveShipping'])->name('automotive-shipping');
Route::get('/dangerous-good-shipping', [PageController::class, 'dangerousGoodShipping'])->name('dangerous-good-shipping');
Route::get('/cargo-storage-solutions', [PageController::class, 'cargoStorageSolutions'])->name('cargo-storage-solutions');
Route::get('/exworks-solutions', [PageController::class, 'exworksSolutions'])->name('exworks-solutions');
Route::get('/container-trading', [PageController::class, 'containerTrading'])->name('container-trading');
Route::get('/container-bl-tracking', [PageController::class, 'containerBlTracking'])->name('container-bl-tracking');
Route::get('/client-reg-login', [PageController::class, 'clientRegLogin'])->name('client-reg-login');
Route::get('/freight-rate', [PageController::class, 'freightRate'])->name('freight-rate');
Route::get('/get-quote', [PageController::class, 'getQuote'])->name('get-quote');
Route::get('/general-tariff', [PageController::class, 'generalTariff'])->name('general-tariff');
Route::get('/quick-payment', [PageController::class, 'quickPayment'])->name('quick-payment');

Route::get('/terms-conditions', [PageController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
// Route::get('/blogs-news', [PageController::class, 'blogsNews'])->name('blogs-news');
// Route::get('/blogs-news/1', [PageController::class, 'blogsDetails'])->name('blogs-news');

Route::group(['prefix'=>'blogs-news'], function () {
    Route::get('/', [BlogController::class,'index'])->name('blogs.index');
    Route::get('/{slug}', [BlogController::class,'show'])->name('blogs.show');
});


Route::middleware('guest')->group(function () {
    Route::get('admin/access', [LoginController::class,'showAdminLogin'])->name('login');
    Route::post('login-post', [LoginController::class,'login'])->name('loginPost');
});

Route::get('/vessel-schedule', [TrackingController::class, 'vesselSchedule'])->name('vesselSchedule');

Route::get('/ports/search', [TrackingController::class, 'searchPort'])->name('ports.search');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::group(['prefix'=>'page-setting'], function () {
        Route::get('/{slug}', [PageSettingController::class,'index'])->name('pageSetting.index');
        Route::put('/{slug}/update', [PageSettingController::class,'update'])->name('pageSetting.update');
    });
    
    Route::group(['prefix'=>'blogs'], function () {
        Route::get('/', [BlogAdminController::class,'index'])->name('blogs.index');
        Route::get('/create', [BlogAdminController::class,'create'])->name('blogs.create');
        Route::post('/store', [BlogAdminController::class,'store'])->name('blogs.store');
        Route::get('/{slug}', [BlogAdminController::class,'edit'])->name('blogs.edit');
        Route::put('/{slug}/update', [BlogAdminController::class,'update'])->name('blogs.update');
        Route::put('/{slug}/delete', [BlogAdminController::class,'delete'])->name('blogs.delete');
    });

    Route::get('settings/edit', [AdminSettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings/update', [AdminSettingController::class, 'update'])->name('settings.update');

    Route::prefix('subscribers')->group(function () {
        Route::get('/', [SubscriberController::class, 'index'])->name('subscribers.index');
        Route::delete('/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');
    });

    Route::post('logout', [LoginController::class,'logout'])->name('logout');

    // Route::resource('container-trackings', ContainerTrackingController::class);
    Route::resource('ports', PortController::class);
    Route::resource('terminals', TerminalController::class);
    Route::resource('vessel-trackings', VesselTrackingController::class);
    Route::resource('container-trackings', ContainerTrackingController::class);

});