<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::get('/', [HomeController::class, 'homePage'])->name('home.page');->middleware(\App\Http\Middleware\Admin::class)
Route::get('/', [HomeController::class, 'homepage'])->name('homepage');


    Route::get('/adminhome', [AdminController::class, 'adminHome'])->name('admin.adminhome');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/post_page', [AdminController::class, 'post_page']);
Route::post('/add_post', [AdminController::class, 'add_post']);

Route::get('/show_post', [AdminController::class, 'show_post']);

Route::get('/delete_post/{id}', [AdminController::class, 'delete_post']);

Route::get('/edit_post/{id}', [AdminController::class, 'edit_post']);

Route::post('/update_post/{id}', [AdminController::class, 'update_Post']);

Route::get('/post_details/{id}', [HomeController::class, 'post_details']);

Route::get('/create_post', [HomeController::class, 'create_post'])->middleware('auth');

Route::post('/user_post', [HomeController::class, 'user_post'])->middleware('auth');

Route::get('/my_post', [HomeController::class, 'my_post'])->middleware('auth');

Route::get('/my_post_del/{id}', [HomeController::class, 'my_post_del'])->middleware('auth');

Route::get('/update_my_post/{id}', [HomeController::class, 'update_my_post'])->middleware('auth');

Route::post('/update_data/{id}', [HomeController::class, 'update_data'])->middleware('auth');

Route::get('/accept_post/{id}', [AdminController::class, 'accept_post'])->middleware('auth');

Route::get('/reject_post/{id}', [AdminController::class, 'reject_post'])->middleware('auth');

Route::get('/about_details', [HomeController::class, 'about_details']);

Route::get('/all_posts', [HomeController::class, 'all_posts']);




