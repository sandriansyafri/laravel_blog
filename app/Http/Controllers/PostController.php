<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $title = '';
        if ($request->category) {
            $category = Category::firstWhere('slug', $request->category)->name;
            $title = " in " . $category;
        } else if ($request->author) {
            $author = User::firstWhere('username', $request->author)->name;
            $title = " in " . $author;
        }
        return view('page.frontend.posts.index', [
            'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(7)->withQueryString(),
            'title' => 'Posts' . $title
        ]);
    }

    public function show(Post $post)
    {
        return view('page.frontend.posts.show', compact(['post']));
    }
}
