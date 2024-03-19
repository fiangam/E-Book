<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('ebooks', [EbookController::class, 'index'])->name('manajemen buku.book-management');
// Route::get('ebooks/create', [EbookController::class, 'create'])->name('manajemen buku.add-book');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware('role:admin')->group(function() {
        Route::get('/dashboard', function () {
            // return 'dashboard admin';
            return view('dashboard');
        })->name('dashboard');

        Route::get('/user-management', function () {
            return view('user management.user-management');
        })->name('user-management');

        Route::get('book-management', [EbookController::class, 'index'])->name('book-management');
        Route::get('add-book', [EbookController::class, 'create'])->name('add-book');
        Route::post('create-manajemen', [EbookController::class, 'book'])->name('create-manajemen');
        Route::delete('ebooks/{id}', [EbookController::class, 'destroy'])->name('ebooks.destroy');

        Route::get('kategori-management', [KategoriController::class, 'index'])->name('kategori-management');
        Route::get('input-kategori', [KategoriController::class, 'create'])->name('input-kategori');
        Route::post('create-kategori', [KategoriController::class, 'kategori'])->name('create-kategori');
        Route::get('kategoris/{id}/edit', [KategoriController::class, 'edit'])->name('kategoris.edit');
        Route::put('kategoris/{id}', [KategoriController::class, 'update'])->name('kategoris.update');
        Route::delete('kategoris/{id}', [KategoriController::class, 'destroy'])->name('kategoris.destroy');



    });

    Route::middleware('role:user')->group(function() {
        Route::get('/dashboard_user', function () {
            // return 'dashboard user';
            return view('dashboard_user');
        })->name('dashboard_user');    
    });
    
});