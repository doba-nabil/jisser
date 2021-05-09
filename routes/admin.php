<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\PopupAdController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\CurrencyController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FAQController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PackageController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\SegmentController;
use App\Http\Controllers\Dashboard\SellerCommentController;
use App\Http\Controllers\Dashboard\SellerController;
use App\Http\Controllers\Dashboard\ServiceCommentController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SubategoryController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [DashboardController::class, 'fronendHome'])->name('fronendHome');
Route::get('get/cities', [DashboardController::class, 'getCities']);
Route::get('get/subcategories', [DashboardController::class, 'getSubcategories']);
Route::get('get/segments', [DashboardController::class, 'getSegments']);
Route::get('dashboard/login', [AuthController::class, 'loginForm'])->name('dashboardLogin');
Route::post('dashboard/login', [AuthController::class, 'login']);
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:moderator'], function () {
    Route::post('logingout', [AuthController::class, 'logingOut'])->name('logingOut');
    Route::get('home', [DashboardController::class, 'home'])->name('dashboardHome');
    Route::get('/', [DashboardController::class, 'home']);
    Route::resource('countries', CountryController::class);
    Route::resource('cities', CityController::class);
    Route::resource('users', UserController::class);
    Route::resource('sellers', SellerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubategoryController::class);
    Route::resource('segments', SegmentController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('comments', ServiceCommentController::class);
    Route::resource('comment', SellerCommentController::class);
    Route::resource('pages', PageController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('faq', FAQController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('popupad', PopupAdController::class);
    Route::get('delete/{type}/{id}', [DashboardController::class, 'deleteID'])->name('deleteID');
    Route::get('options', [DashboardController::class, 'options'])->name('options');
    Route::post('options', [DashboardController::class, 'optionsSave']);
    Route::get('requests', [ServiceController::class, 'requests'])->name('requests');
    Route::get('search', [DashboardController::class, 'search'])->name('search');
});
Route::get('/clear', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";
    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";
    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";
    $clearrout = Artisan::call('route:cache');
    echo 'Routes cache cleared<br>';
});

