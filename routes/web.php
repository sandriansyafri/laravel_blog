<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StaticPageController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('create', function () {
      Post::create([
            'category_id' => 4,
            'title' => 'title 5',
            'slug' => 'title-5',
            'excerpt' => 'test',
            'body' => 'test',
      ]);
});
Route::get('/', [StaticPageController::class, 'home'])->name('home');
Route::get('/about', [StaticPageController::class, 'about'])->name('about');
Route::resources([
      'posts' => PostController::class,
      'categories' => CategoryController::class,
]);
