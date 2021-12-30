<?php

use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::get('/login', LoginController::class)->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', RegisterController::class)->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::get('/dashboard/posts', [DashboardController::class, 'postsIndex'])->name('dashboard.posts.index')->middleware('auth');
Route::get('/dashboard/posts/create', [DashboardController::class, 'postsCreate'])->name('dashboard.posts.create')->middleware('auth');
Route::get('/dashboard/posts/check-slug', [DashboardController::class, 'postsCheckSlug'])->middleware('auth');
Route::get('/dashboard/posts/{post:slug}', [DashboardController::class, 'postsShow'])->name('dashboard.posts.show')->middleware('auth');
Route::get('/dashboard/posts/{post:slug}/edit', [DashboardController::class, 'postsEdit'])->name('dashboard.posts.edit')->middleware('auth');
Route::post('/dashboard/posts', [DashboardController::class, 'postsStore'])->name('dashboard.posts.store')->middleware('auth');
Route::put('/dashboard/posts/{post:id}', [DashboardController::class, 'postsUpdate'])->name('dashboard.posts.update')->middleware('auth');
Route::delete('/dashboard/posts/{post:id}', [DashboardController::class, 'postsDestroy'])->name('dashboard.posts.destory')->middleware('auth');

Route::resource('dashboard/categories', DashboardCategoryController::class, [
      'as' => 'dashboard'
])->except(['show'])->middleware(['auth', 'isAdmin']);


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
