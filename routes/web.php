<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::view('/hakkimda', 'pages.about')->name('about');
Route::view('/iletisim', 'pages.contact')->name('contact');
Route::post('/iletisim', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::get('/yazilar', [\App\Http\Controllers\PostController::class, 'blog'])->name('blog.index');
Route::get('/calisma-alanlarimiz', [\App\Http\Controllers\PracticeController::class, 'index'])->name('practices.index');
Route::get('/calisma-alanlarimiz/{slug}', [\App\Http\Controllers\PracticeController::class, 'show'])->name('practices.show');
Route::get('/posts/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::post('/posts/{post}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    
    Route::get('/comments', [\App\Http\Controllers\Admin\CommentController::class, 'index'])->name('comments.index');
    Route::put('/comments/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'toggleApproval'])->name('comments.toggle');
    Route::delete('/comments/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('comments.destroy');
    
    Route::get('/contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    Route::delete('/contacts/{contactMessage}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');
});

require __DIR__.'/auth.php';
