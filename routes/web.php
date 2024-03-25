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

        


        Route::get('ebooks', [EbookController::class, 'index'])->name('ebooks.index');
        Route::get('ebooks/create', [EbookController::class, 'create'])->name('ebooks.create');
        Route::post('ebooks', [EbookController::class, 'store'])->name('ebooks.book');
        Route::delete('ebooks/{id}', [EbookController::class, 'destroy'])->name('ebooks.destroy');
        Route::get('pdf-view/{id}', [EbookController::class, 'view'])->name('pdf-view');

        Route::get('kategoris', [KategoriController::class, 'index'])->name('kategoris.index');
        Route::get('kategoris/create', [KategoriController::class, 'create'])->name('kategoris.create');
        Route::post('kategoris', [KategoriController::class, 'kategori'])->name('kategoris.kategori');
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
