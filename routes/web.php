<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;

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
    return view('frontend.index');
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


//__ Home Slider Route __//
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider/{id}', 'UpdateProfile')->name('update.slide');
});

//__ About Page Route __//
Route::controller(AboutController::class)->group(function () {
    // Backend Route ///
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/about/{id}', 'UpdateAbout')->name('update.about');
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.image');
    Route::post('/update/multi/image/{id}', 'UpdateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'destroy')->name('delete.image');

    // Frontend Route ///
    Route::get('/about', 'HomeAbout')->name('home.about');
});

// __Portfolio Route Section__ //
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index')->middleware(['auth', 'verified']);
Route::get('/create/portfolio', [PortfolioController::class, 'create'])->name('portfolio.create')->middleware(['auth', 'verified']);
Route::post('/store/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store')->middleware(['auth', 'verified']);
Route::get('/edit/portfolio/{id}', [PortfolioController::class, 'edit'])->name('portfolio.edit')->middleware(['auth', 'verified']);
Route::post('/update/portfolio/{id}', [PortfolioController::class, 'update'])->name('portfolio.update')->middleware(['auth', 'verified']);
Route::get('/view/portfolio/{id}', [PortfolioController::class, 'view'])->name('portfolio.view')->middleware(['auth', 'verified']);
Route::get('/delete/portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy')->middleware(['auth', 'verified']);
// __Portfolio Frontend Route section__ //
Route::get('/portfolio/details/{id}', [PortfolioController::class, 'details'])->name('portfolio.details');



// __Blog Category Route Section__ //
Route::get('/blog', [BlogCategoryController::class, 'index'])->name('blog_category.index')->middleware(['auth', 'verified']);
Route::get('/blog/create', [BlogCategoryController::class, 'create'])->name('blog_category.create')->middleware(['auth', 'verified']);
Route::post('/blog/store', [BlogCategoryController::class, 'store'])->name('blog_category.store')->middleware(['auth', 'verified']);
Route::get('/blog/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('blog_category.destroy')->middleware(['auth', 'verified']);



require __DIR__ . '/auth.php';
