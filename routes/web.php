<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Services
Route::prefix('layanan')->name('services.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/{slug}', [ServiceController::class, 'show'])->name('show');
});

// Booking
Route::prefix('jadwal')->name('booking.')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::post('/', [BookingController::class, 'store'])->name('store');
    Route::get('/slots', [BookingController::class, 'getAvailableSlots'])->name('slots');
    Route::get('/success/{bookingCode}', [BookingController::class, 'success'])->name('success');
});

// Alternative route for booking
Route::get('/booking', [BookingController::class, 'index'])->name('booking');

// Articles / Blog
Route::prefix('artikel')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/kategori/{slug}', [ArticleController::class, 'category'])->name('category');
    Route::get('/{slug}', [ArticleController::class, 'show'])->name('show');
});

// Contact
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

// Static Pages
Route::get('/tentang', [PageController::class, 'about'])->name('about');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/kebijakan-privasi', [PageController::class, 'privacy'])->name('privacy');
Route::get('/syarat-ketentuan', [PageController::class, 'terms'])->name('terms');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth routes (no middleware)
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Consultation Management
        Route::get('/consultations', [App\Http\Controllers\Admin\ConsultationController::class, 'index'])->name('consultations.index');
        Route::get('/consultations/{id}', [App\Http\Controllers\Admin\ConsultationController::class, 'show'])->name('consultations.show');
        Route::patch('/consultations/{id}/status', [App\Http\Controllers\Admin\ConsultationController::class, 'updateStatus'])->name('consultations.updateStatus');

        // Service Management
        Route::resource('services', App\Http\Controllers\Admin\ServiceManagementController::class)->except(['show']);

        // Testimonial Management
        Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class);
        Route::post('/testimonials/{testimonial}/approve', [App\Http\Controllers\Admin\TestimonialController::class, 'approve'])->name('testimonials.approve');
        Route::post('/testimonials/{testimonial}/reject', [App\Http\Controllers\Admin\TestimonialController::class, 'reject'])->name('testimonials.reject');

        // Article Management
        Route::resource('articles', App\Http\Controllers\Admin\ArticleController::class);

        // Schedule Management
        Route::get('/schedules/bulk-create', [App\Http\Controllers\Admin\ScheduleController::class, 'showBulkCreate'])->name('schedules.bulk-create');
        Route::post('/schedules/bulk-create', [App\Http\Controllers\Admin\ScheduleController::class, 'bulkCreate'])->name('schedules.bulk-store');
        Route::post('/schedules/{schedule}/toggle', [App\Http\Controllers\Admin\ScheduleController::class, 'toggleAvailability'])->name('schedules.toggle');
        Route::resource('schedules', App\Http\Controllers\Admin\ScheduleController::class);

        // Settings Management
        Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings.index');
        Route::post('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');
        Route::delete('/settings/image', [App\Http\Controllers\Admin\SettingsController::class, 'deleteImage'])->name('settings.deleteImage');
    });
});

