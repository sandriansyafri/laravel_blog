<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{

    public function index()
    {
        return view('page.backend.dashboard');
    }
    public function postsIndex()
    {

        return view('page.backend.dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postsCreate()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('page.backend.dashboard.posts.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postsStore(Request $request)
    {

        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $fileName = time() . '-' . $fileName;
        $path = public_path('assets/images/posts');

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:posts,slug',
            'body' => 'required|string',
            'image' => 'image|file|max:1024',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($file) {
            $file->move($path, $fileName);
            $data['image'] = $fileName;
        }

        $data['user_id'] = auth()->user()->id;
        $data['excerpt'] = Str::limit(strip_tags($data['body']), 100);
        Post::create($data);

        return redirect()->route('dashboard.posts.index')->with('status', 'created');
    }

    public function postsCheckSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json([
            'ok' => false,
            'slug' => $slug,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postsShow(Post $post)
    {
        return view('page.backend.dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postsEdit(Post $post)
    {
        return view('page.backend.dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()->pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postsUpdate(Request $request, Post $post)
    {

        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $fileName = time() . '-' . $fileName;
        $path = public_path('assets/images/posts');

        $rules = [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'body' => 'required',
            'image' => 'image|file|max:1024`'
        ];

        if ($post->slug !== $request->slug) {
            $rules['slug'] = 'required|string|unique:posts,slug';
        }

        request()->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                unlink($path . '/' . $post->image);
            }
            $file->move($path, $fileName);
            $data['image'] = $fileName;
        }
        $data['user_id'] = auth()->user()->id;
        $data['category_id'] = $request->category_id;
        $data['excerpt'] = Str::limit(strip_tags($request->body), 100);
        $data['body'] = $request->body;


        $post->update($data);
        return redirect()->route('dashboard.posts.index')->with('status', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postsDestroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        $post->delete();
        return redirect()->route('dashboard.posts.index')->with('status', 'deleted');
    }
}
