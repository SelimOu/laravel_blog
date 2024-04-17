<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\formcategorieController;



Route::get('/',[PagesController::class, 'welcome'])->name('welcome');

Route::get('/welcome',[PagesController::class, 'welcome'])->name('welcome');

Route::get('/legals',[PagesController::class, 'legals'])->name('legals');

Route::get('/about',[PagesController::class, 'about'])->name('about');

Route::get('/dashboard/posts', PostController::class .'@index')->name('posts.index');

Route::get('/dashboard/posts/create', PostController::class . '@create')->name('posts.create');

Route::post('/dashboard/posts', PostController::class .'@store')->name('posts.store');

Route::get('/dashboard/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');

Route::put('/dashboard/posts/{post}', PostController::class .'@update')->name('posts.update');

Route::delete('/dashboard/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');

Route::get('/dashboard', [AdminController::class, 'admin'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/categories/formcategorie', formcategorieController::class .'@formcategorie')->name('formcategorie');

Route::get('/dashboard/categories', formcategorieController::class .'@listcategorie')->name('listcategorie');

Route::post('/dashboard/categories', formcategorieController::class .'@CreerCategorie')->name('creer.categorie');

Route::delete('/dashboard/categories/{post}', formcategorieController::class .'@destroyCategorie')->name('destroyCategorie');

Route::get('/dashboard/categories/{post}/edit', formcategorieController::class .'@editCategorie')->name('updateCategorie');

Route::put('/dashboard/categories/{post}', formcategorieController::class .'@updateCategorie')->name('editCategorie');

Route::get('/dashboard/users', [AdminController::class, 'users'])->middleware(['auth', 'verified'])->name('users');

Route::delete('/dashboard/users/{post}', AdminController::class .'@destroy')->name('destroyUsers');

Route::put('/dashboard/posts/{post}', AdminController::class .'@update')->name('updateUsers');

Route::middleware('auth')
->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
