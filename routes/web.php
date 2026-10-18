<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. AUTHENTICATION ROUTES
// ==========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// 2. PUBLIC ROUTES (Frontend Website)
// ==========================================
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/profil', [PublicController::class, 'profile'])->name('profile');
Route::get('/layanan', [PublicController::class, 'services'])->name('services.public');
Route::get('/layanan/{id}', [PublicController::class, 'showService'])->name('services.show');
Route::get('/artikel', [PublicController::class, 'articles'])->name('articles.public');
Route::get('/artikel/{id}', [PublicController::class, 'showArticle'])->name('articles.show');
Route::get('/galeri', [PublicController::class, 'galleries'])->name('galleries.public');
Route::get('/galeri/{id}', [PublicController::class, 'showGallery'])->name('galleries.show');
Route::get('/kontak', [PublicController::class, 'contact'])->name('contact');

// Kirim Pesan Kontak & Form Pemesanan Layanan Publik
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');
Route::get('/layanan/{id}/pesan', [OrderController::class, 'create'])->name('services.order.form');
Route::post('/layanan/{id}/pesan', [OrderController::class, 'store'])->name('services.order.store');


// ==========================================
// 3. ADMIN ROUTES (Protected by Auth Middleware)
// ==========================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Company Profile (Singleton)
    Route::get('/profile', [CompanyProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [CompanyProfileController::class, 'update'])->name('profile.update');

    // Pesan Masuk (Messages)
    Route::get('/messages', [ContactController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [ContactController::class, 'show'])->name('messages.show');
    Route::post('/messages/{id}/reply', [ContactController::class, 'reply'])->name('messages.reply');
    Route::delete('/messages/{id}', [ContactController::class, 'destroy'])->name('messages.destroy');

    // Pesanan Layanan (Orders)
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');
});


// ==========================================
// 4. CRUD RESOURCES (Services, Articles, Galleries)
// ==========================================
Route::resource('services', ServiceController::class);
Route::resource('articles', ArticleController::class);
Route::resource('galleries', GalleryController::class);