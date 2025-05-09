<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DenominationController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\SaleTypeController;
use App\Http\Controllers\PharmaceuticalFormController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BatchController;
use App\Livewire\BatchForm;
use livewire\Livewire;


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
Route::middleware('auth')->group(function () {
    Route::resource('denominations', DenominationController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('laboratories', LaboratoryController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('saletypes', SaleTypeController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('pharmaceuticalforms', PharmaceuticalFormController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('symptoms', SymptomController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('suppliers', SupplierController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('batches', BatchController::class);
});


/* Route::Livewire('/batches/form', BatchForm::class)->name('batches.form'); */
/* Route::middleware('auth')->group(function () {
    Route::resource('permissions', PermissionController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
}); */
require __DIR__.'/auth.php';
