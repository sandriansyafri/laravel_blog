<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StaticPageController;
use App\Models\Post;
use App\Models\User;
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

Route::get('/authors', function () {
      $authors = User::all();
      return view('page.frontend.authors.index', compact(['authors']));
})->name('authors.index');

Route::get('/authors/{author}', function (User $author) {
      $posts = $author->posts->load('category', 'user');
      $data = [
            'title' => 'Author | ' . $author->name,
      ];
      return view('page.frontend.posts.index', compact(['posts', 'data']));
})->name('authors.show');

Route::resources([
      'posts' => PostController::class,
      'categories' => CategoryController::class,
]);
