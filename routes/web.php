<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOfficeController;
use App\Http\Controllers\AdminSubscriptionController;
use App\Http\Controllers\AdminSubscriptionPlanController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});


/*
|--------------------------------------------------------------------------
| Password Reset
|--------------------------------------------------------------------------
*/

Route::get(
    '/forgot-password',
    [PasswordResetController::class, 'showForgotPasswordForm']
)->name('password.request');

Route::post(
    '/forgot-password',
    [PasswordResetController::class, 'sendResetLink']
)->name('password.email');

Route::get(
    '/reset-password/{token}',
    [PasswordResetController::class, 'showResetForm']
)->name('password.reset');

Route::post(
    '/reset-password',
    [PasswordResetController::class, 'resetPassword']
)->name('password.update');


/*
|--------------------------------------------------------------------------
| General Pages
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicPageController::class, 'home'])
    ->name('home');

Route::get('/about', [PublicPageController::class, 'about'])
    ->name('public.about');

Route::get('/how-it-works', [PublicPageController::class, 'howItWorks'])
    ->name('public.how-it-works');

Route::get('/pricing', [PublicPageController::class, 'pricing'])
    ->name('public.pricing');

Route::get('/subscribe', [PublicPageController::class, 'subscribe'])
    ->name('public.subscribe');

Route::get('/contact', [PublicPageController::class, 'contact'])
    ->name('public.contact');

Route::get('/privacy-policy', [PublicPageController::class, 'privacyPolicy'])
    ->name('public.privacy-policy');

Route::get('/terms', [PublicPageController::class, 'terms'])
    ->name('public.terms');

Route::get('/faq', [PublicPageController::class, 'faq'])
    ->name('public.faq');

Route::get('/sitemap.xml', [PublicPageController::class, 'sitemap'])
    ->name('public.sitemap');

Route::get('/offices', [OfficeController::class, 'index'])
    ->name('offices.index');

Route::get('/offices/{office:slug}', [OfficeController::class, 'show'])
    ->name('offices.show');
    
/*
|--------------------------------------------------------------------------
| Authenticated Users
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Subscriber Dashboard
    |--------------------------------------------------------------------------
    */

    Route::middleware('subscriber')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
    });


    /*
    |--------------------------------------------------------------------------
    | Admin Panel
    |--------------------------------------------------------------------------
    */

    Route::middleware('admin')->prefix('admin')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Admin Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/', [AdminController::class, 'index'])
            ->name('admin.dashboard');


        /*
        |--------------------------------------------------------------------------
        | Offices - Admin
        |--------------------------------------------------------------------------
        */

        Route::get('/offices', [AdminOfficeController::class, 'index'])
            ->name('admin.offices.index');

        Route::get('/offices/create', [AdminOfficeController::class, 'create'])
            ->name('admin.offices.create');

        Route::post('/offices', [AdminOfficeController::class, 'store'])
            ->name('admin.offices.store');

        Route::get(
            '/offices/{office}/edit',
            [AdminOfficeController::class, 'edit']
        )->name('admin.offices.edit');

        Route::put(
            '/offices/{office}',
            [AdminOfficeController::class, 'update']
        )->name('admin.offices.update');

        Route::delete(
            '/offices/{office}',
            [AdminOfficeController::class, 'destroy']
        )->name('admin.offices.destroy');


        /*
        |--------------------------------------------------------------------------
        | Subscription Plans - Admin
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/subscription-plans',
            [AdminSubscriptionPlanController::class, 'index']
        )->name('admin.subscription-plans.index');


        /*
        |--------------------------------------------------------------------------
        | Subscriptions - Admin
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/subscriptions',
            [AdminSubscriptionController::class, 'index']
        )->name('admin.subscriptions.index');

        Route::get(
            '/subscriptions/create',
            [AdminSubscriptionController::class, 'create']
        )->name('admin.subscriptions.create');

        Route::post(
            '/subscriptions',
            [AdminSubscriptionController::class, 'store']
        )->name('admin.subscriptions.store');

        Route::put(
            '/subscriptions/{subscription}/status',
            [AdminSubscriptionController::class, 'updateStatus']
        )->name('admin.subscriptions.update-status');


        /*
        |--------------------------------------------------------------------------
        | Users - Admin
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/users',
            [AdminUserController::class, 'index']
        )->name('admin.users.index');

        Route::get(
            '/users/create',
            [AdminUserController::class, 'create']
        )->name('admin.users.create');

        Route::post(
            '/users',
            [AdminUserController::class, 'store']
        )->name('admin.users.store');

        Route::get(
            '/users/{user}/edit',
            [AdminUserController::class, 'edit']
        )->name('admin.users.edit');

        Route::put(
            '/users/{user}',
            [AdminUserController::class, 'update']
        )->name('admin.users.update');

        Route::put(
            '/users/{user}/status',
            [AdminUserController::class, 'updateStatus']
        )->name('admin.users.update-status');

        Route::delete(
            '/users/{user}',
            [AdminUserController::class, 'destroy']
        )->name('admin.users.destroy');
    });


    /*
    |--------------------------------------------------------------------------
    | SOWLFA Features - Active Subscription Required
    |--------------------------------------------------------------------------
    */

    Route::middleware('subscription')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Agents
        |--------------------------------------------------------------------------
        */

        Route::get('/agents', [AgentController::class, 'index'])
            ->name('agents.index');

        Route::get('/agents/create', [AgentController::class, 'create'])
            ->name('agents.create');

        Route::post('/agents', [AgentController::class, 'store'])
            ->name('agents.store');


        /*
        |--------------------------------------------------------------------------
        | Properties
        |--------------------------------------------------------------------------
        */

        Route::get('/properties', [PropertyController::class, 'index'])
            ->name('properties.index');

        Route::get('/properties/create', [PropertyController::class, 'create'])
            ->name('properties.create');

        Route::post('/properties', [PropertyController::class, 'store'])
            ->name('properties.store');
 
        Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])
            ->name('properties.destroy');

        Route::get(
            '/properties/search',
            [PropertyController::class, 'search']
        )->name('properties.search');

        Route::get(
            '/properties/{property}',
            [PropertyController::class, 'show']
        )->name('properties.show');
    });


    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

