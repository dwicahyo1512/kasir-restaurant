<?php

use App\Http\Controllers\Pesanan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/now', function () {
    return view('auth.login');
});

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/cart', function () {
        return view('food');
    });
    Route::get('/market', function () {
        return view('marketplace');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('users', App\Http\Controllers\UserController::class);
        Route::resource('kategori', App\Http\Controllers\Kategori::class);
        Route::resource('meja', App\Http\Controllers\Meja::class);
        Route::resource('menu', App\Http\Controllers\Menu::class);
        Route::resource('discount', App\Http\Controllers\discount::class);
        Route::resource('kasir', App\Http\Controllers\Kasir::class);
        Route::resource('pesanan', App\Http\Controllers\Pesanan::class);
        Route::get('test/pdf', [App\Http\Controllers\Kasir::class, 'struk1'])->name('test1.pdf');
        Route::get('test/pdf1', [App\Http\Controllers\Kasir::class, 'struk2'])->name('test2.pdf');
        Route::get('proses', [Pesanan::class, 'proses'])->name('proses.pesanan');
        Route::post('proses', [Pesanan::class, 'UpdateStatus'])->name('update.pesanan');

    });
    Route::get('/testhtml', function () {
        return view('invoice');
    });
    require __DIR__ . '/auth.php';
});
