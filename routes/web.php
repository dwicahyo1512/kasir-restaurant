<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Client;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kasir;
use App\Http\Controllers\Laporan;
use App\Http\Controllers\Pesanan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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
Route::get('struk/pesanan/{id}', [App\Http\Controllers\Kasir::class, 'struk'])->name('struk.pdf');

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
    Route::get('/pelanggan/cart', [Client::class, 'client'])->name('client.pesanan');
    Route::post('/client', [Client::class, 'post_client'])->name('client.post');


    Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);

    Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
    Route::get('pdf', [Kasir::class, 'pdf_struk']);
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->middleware(['verified'])
            ->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::put('/update', [SettingController::class, 'update'])->name('update');
        });

        Route::resource('users', App\Http\Controllers\UserController::class);
        Route::resource('kategori', App\Http\Controllers\Kategori::class);
        Route::resource('meja', App\Http\Controllers\Meja::class);
        Route::resource('menu', App\Http\Controllers\Menu::class);
        Route::resource('discount', App\Http\Controllers\discount::class);
        Route::resource('kasir', App\Http\Controllers\Kasir::class);
        Route::resource('pesanan', App\Http\Controllers\Pesanan::class);

        Route::get('client_users', [Client::class, 'client_users'])->name('client_users.pesanan');
        Route::post('client_users', [Client::class, 'store_users'])->name('client_users.store');
        Route::get('laporan', [Laporan::class, 'laporan'])->name('laporan.pesanan');
        Route::post('laporan', [Laporan::class, 'store'])->name('laporan.store');
        Route::get('proses', [Pesanan::class, 'proses'])->name('proses.pesanan');
        Route::post('proses', [Pesanan::class, 'UpdateStatus'])->name('update.pesanan');
    });

    require __DIR__ . '/auth.php';
});
