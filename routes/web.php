<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StaticPageController;
use App\Models\Category;
use App\Models\User;

Route::get('/', [StaticPageController::class, 'home'])->name('home');
Route::get('/about', [StaticPageController::class, 'about'])->name('about');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('categories', function () {
      return view('page.frontend.categories.index', [
            'categories' => Category::all()
      ]);
})->name('categories.index');

Route::get('authors', function () {
      return view('page.frontend.authors.index', [
            'authors' => User::all()
      ]);
})->name('authors.index');


// @ GAK DI PAKE KARENA ADA REQUEST DARI POST 

// Route::get('/categories/{category:slug}', function (Category $category) {
//       return view('page.frontend.posts.index', [
//             'posts' => $category->posts->load('category', 'author'),
//             'title' => $category->name
//       ]);
// })->name('categories.show');

// Route::get('/authors/{author:username}', function (User $author) {
//       return view('page.frontend.posts.index', [
//             'posts' => $author->posts->load('category', 'author'),
//             'title' => $author->name
//       ]);
// })->name('authors.show');
