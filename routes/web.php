<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\formcategorieController;
Use App\Http\Middleware\admin;



Route::get('/',[PagesController::class, 'welcome'])->name('welcome');

Route::get('/welcome',[PagesController::class, 'welcome'])->name('welcome');

Route::get('/legals',[PagesController::class, 'legals'])->name('legals');

Route::get('/about',[PagesController::class, 'about'])->name('about');

Route::get('/dashboard/posts', PostController::class .'@index')->middleware(['auth', 'verified'])->name('posts.index');

Route::get('/dashboard/posts/create', PostController::class . '@create')->middleware(['auth', 'verified'])->name('posts.create');

Route::post('/dashboard/posts', PostController::class .'@store')->middleware(['auth', 'verified'])->name('posts.store');

Route::get('/dashboard/posts/{post}/edit', PostController::class .'@edit')->middleware(['auth', 'verified'])->name('posts.edit');

Route::put('/dashboard/posts/{post}', PostController::class .'@update')->middleware(['auth', 'verified'])->name('postsupdate');

Route::delete('/dashboard/posts/{post}', PostController::class .'@destroy')->middleware(['auth', 'verified'])->name('posts.destroy');

Route::get('/dashboard', [AdminController::class, 'admin'])->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware'=>admin::class],function(){

Route::get('/dashboard/users', [AdminController::class, 'users'])->middleware(['auth', 'verified'])->name('users');


    Route::get('/dashboard/categories/formcategorie', formcategorieController::class .'@formcategorie')->middleware(['auth', 'verified'])->name('formcategorie');

Route::get('/dashboard/categories', formcategorieController::class .'@listcategorie')->middleware(['auth', 'verified'])->name('listcategorie');

Route::post('/dashboard/categories', formcategorieController::class .'@CreerCategorie')->middleware(['auth', 'verified'])->name('creer.categorie');

Route::delete('/dashboard/categories/{post}', formcategorieController::class .'@destroyCategorie')->middleware(['auth', 'verified'])->name('destroyCategorie');

Route::get('/dashboard/categories/{post}/edit', formcategorieController::class .'@editCategorie')->middleware(['auth', 'verified'])->name('updateCategorie');

Route::put('/dashboard/categories/{post}', formcategorieController::class .'@updateCategorie')->middleware(['auth', 'verified'])->name('editCategorie');

    Route::delete('/dashboard/users/{post}', AdminController::class .'@destroy')->middleware(['auth', 'verified'])->name('destroyUsers');

Route::put('/dashboard/users/{post}', AdminController::class .'@update')->middleware(['auth', 'verified'])->name('updateUsers');

Route::delete('/dashboard/users/{post}', AdminController::class .'@destroy')->middleware(['auth', 'verified'])->name('destroyUsers');

Route::put('/dashboard/users/{post}', AdminController::class .'@update')->middleware(['auth', 'verified'])->name('updateUsers');
});

Route::get('/blog/{post}',[PagesController::class, 'show'])->name('show');

Route::middleware('auth')
->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
