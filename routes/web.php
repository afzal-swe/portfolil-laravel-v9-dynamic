<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\MessageController;
use App\Http\Controllers\Home\FeedbackController;
use App\Http\Controllers\Home\UserController;
use App\Http\Controllers\Home\WorkingController;


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

// Route::get('/', function () {
//     return view('frontend.index');
// });

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
    Route::get('/', 'home')->name('home');
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slider/{id}', 'UpdateProfile')->name('update.slide');
});

//__ About Page Route __//
Route::middleware(['auth'])->group(function () {

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
});
Route::controller(AboutController::class)->group(function () {

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
Route::get('/portfolio/home', [PortfolioController::class, 'Home'])->name('portfolio.home');
Route::get('/portfolio/details/{id}', [PortfolioController::class, 'details'])->name('portfolio.details');


// __Blog Category Route Section__ //
Route::get('/blog/category', [BlogCategoryController::class, 'index'])->name('blog_category.index')->middleware(['auth', 'verified']);
Route::get('/blog/category/create', [BlogCategoryController::class, 'create'])->name('blog_category.create')->middleware(['auth', 'verified']);
Route::post('/blog/category/store', [BlogCategoryController::class, 'store'])->name('blog_category.store')->middleware(['auth', 'verified']);
Route::get('/blog/category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blog_category.edit')->middleware(['auth', 'verified']);
Route::post('/blog/category/update/{id}', [BlogCategoryController::class, 'update'])->name('blog_category.update')->middleware(['auth', 'verified']);
Route::get('/blog/category/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('blog_category.destroy')->middleware(['auth', 'verified']);


// __Blog Route Section__ //
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index')->middleware(['auth', 'verified']);
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create')->middleware(['auth', 'verified']);
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store')->middleware(['auth', 'verified']);
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit')->middleware(['auth', 'verified']);
Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update')->middleware(['auth', 'verified']);
Route::get('/blog/view/{id}', [BlogController::class, 'view'])->name('blog.view')->middleware(['auth', 'verified']);
Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.destroy')->middleware(['auth', 'verified']);
// __Blog Frontend Route Section__ //
Route::get('/blog/details/{id}', [BlogController::class, 'details'])->name('blog.details');
Route::get('/category/blog/{id}', [BlogController::class, 'categoryBlog'])->name('category.blog');
Route::get('/blog/home', [BlogController::class, 'HomeBlog'])->name('home.blog');


// __Footer Route Section__ //
Route::get('/footer', [FooterController::class, 'index'])->name('footer.index')->middleware(['auth', 'verified']);
Route::get('/footer/create', [FooterController::class, 'create'])->name('footer.create')->middleware(['auth', 'verified']);
Route::post('/footer/store', [FooterController::class, 'store'])->name('footer.store')->middleware(['auth', 'verified']);
Route::get('/footer/edit/{id}', [FooterController::class, 'edit'])->name('footer.edit')->middleware(['auth', 'verified']);
Route::post('/footer/update/{id}', [FooterController::class, 'update'])->name('footer.update')->middleware(['auth', 'verified']);
Route::get('/footer/view/{id}', [FooterController::class, 'view'])->name('footer.view')->middleware(['auth', 'verified']);
Route::get('/footer/destroy/{id}', [FooterController::class, 'destroy'])->name('footer.destroy')->middleware(['auth', 'verified']);


// __Contact Route Section__ //
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index')->middleware(['auth', 'verified']);
Route::get('/contact/view/{id}', [ContactController::class, 'view'])->name('contact.view')->middleware(['auth', 'verified']);
Route::get('/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.destroy')->middleware(['auth', 'verified']);
// __Contact Frontend Route Section
Route::get('/contact/page', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/message', [ContactController::class, 'store'])->name('store.message');


// __Message Route Section__ //
Route::get('/contact/message', [MessageController::class, 'index'])->name('message.index')->middleware(['auth', 'verified']);
Route::get('/message/view/{id}', [MessageController::class, 'view'])->name('message.view')->middleware(['auth', 'verified']);
Route::get('/message/destroy/{id}', [MessageController::class, 'destroy'])->name('message.destroy')->middleware(['auth', 'verified']);
// __Message Frontend Route Section
Route::post('/message/send', [MessageController::class, 'store'])->name('message.store');


// __FeedBack Route Section__ //
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index')->middleware(['auth', 'verified']);
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create')->middleware(['auth', 'verified']);
Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store')->middleware(['auth', 'verified']);
Route::get('/feedback/edit/{id}', [FeedbackController::class, 'edit'])->name('feedback.edit')->middleware(['auth', 'verified']);
Route::post('/feedback/update/{id}', [FeedbackController::class, 'update'])->name('feedback.update')->middleware(['auth', 'verified']);
Route::get('/feedback/view/{id}', [FeedbackController::class, 'view'])->name('feedback.view')->middleware(['auth', 'verified']);
Route::get('/feedback/destroy/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy')->middleware(['auth', 'verified']);


// __ User Route Section__ //
Route::get('/manage/user', [UserController::class, 'index'])->name('user.index')->middleware(['auth', 'verified']);
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete')->middleware(['auth', 'verified']);

// __ Working process System Route Section__ //
Route::get('/working/process', [WorkingController::class, 'index'])->name('working.index')->middleware(['auth', 'verified']);
Route::get('/working/process/create', [WorkingController::class, 'create'])->name('working.create')->middleware(['auth', 'verified']);
Route::post('/working/process/store', [WorkingController::class, 'store'])->name('working.store')->middleware(['auth', 'verified']);
Route::get('/working/process/edit/{id}', [WorkingController::class, 'edit'])->name('working.edit')->middleware(['auth', 'verified']);
Route::post('/working/process/update/{id}', [WorkingController::class, 'update'])->name('working.update')->middleware(['auth', 'verified']);
Route::get('/working/process/view/{id}', [WorkingController::class, 'view'])->name('working.view')->middleware(['auth', 'verified']);
Route::get('/working/process/delete/{id}', [WorkingController::class, 'destroy'])->name('working.delete')->middleware(['auth', 'verified']);






require __DIR__ . '/auth.php';
