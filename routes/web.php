<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('admin.index');
})->name('dashboard')->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['auth', 'verified']);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware(['auth', 'verified']);
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware(['auth', 'verified']);
});


//__ Admin All Route __//

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile')->middleware(['auth', 'verified']);
    Route::get('/profile/edit/{id}', 'edit')->name('profile.edit')->middleware(['auth', 'verified']);
    Route::post('/profile/update/{id}', 'store')->name('store.profile')->middleware(['auth', 'verified']);
    Route::get('/change/password', 'ChangePassword')->name('change.password')->middleware(['auth', 'verified']);
    Route::post('/update/password', 'UpdatePassword')->name('update.password')->middleware(['auth', 'verified']);
});

require __DIR__ . '/auth.php';
