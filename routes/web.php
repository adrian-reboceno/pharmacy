<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // otras rutas protegidas...
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('status', StatusController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::match(['put', 'patch'], 'users/{user}/updatePassword', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::get('users/{user}/editpassword', [UserController::class, 'editPassword'])->name('users.editpassword');

});
Route::middleware('auth')->group(function () {
    Route::resource('roles', RoleController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
});
/* Route::middleware('auth')->group(function () {
    Route::resource('permissions', PermissionController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
}); */
require __DIR__.'/auth.php';
