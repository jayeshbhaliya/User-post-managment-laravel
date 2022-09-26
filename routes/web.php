<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'index'])->name('post.index');

Auth::routes();
Route::middleware(['isLogin'])->group(function () {
    // HomeController method
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // PostController methods
    Route::get('/users', [UserProfileController::class, 'users'])->name('profile.users');
    Route::get('/profile', [UserProfileController::class, 'myProfile'])->name('myProfile');
    Route::get('/edit-profile/{id}', [UserProfileController::class, 'editProfile'])->name('Profile.edit');
    Route::get('/add-profile/{id}', [UserProfileController::class, 'addProfile'])->name('Profile.add');
    Route::post('/update-profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/save-profile', [UserProfileController::class, 'saveProfile'])->name('profile.save');
    // PostController methods
    Route::get('/create-post', [PostController::class, 'createPost'])->name('post.create');
    Route::post('/save-post', [PostController::class, 'savePost'])->name('post.save');
    Route::get('/mypost', [PostController::class, 'mypost'])->name('user.post');
    Route::get('/delete-post/{id}',[PostController::class,'deletePost'])->name('post.delete');
    Route::get('/edit-post/{id}',[PostController::class,'editPost'])->name('post.edit');
    Route::Post('/update-post',[PostController::class,'updatePost'])->name('post.update');
});
