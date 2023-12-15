<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

route::get('/dashboard', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

route::get('/create', [KategoriController::class, 'index'])->middleware(['auth', 'verified'])->name('create');

// route::get('/dashboard', [KategoriController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

route::post('/create', [TaskController::class, 'store'])->name('task.store');

// route::get('/dashboard', [KategoriController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

route::resource('task', TaskController::class);

route::resource('kategori', KategoriController::class);

// route::get('/create', [KategoriController::class, 'create']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
