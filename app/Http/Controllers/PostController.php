<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'permission:posts.index',
            'permission:posts.store',
            'permission:posts.create',
            'permission:posts.update',
            'permission:posts.destroy',
            'permission:posts.edit',
        ]);
    }

    public function index()
    {
        // $posts = Post::with('category')->paginate(15);
        if (auth()->user()->hasRole('Client')) {
            $posts = auth()->user()->posts()->latest()->with('category')->paginate(15);
        }
        elseif (auth()->user()->hasRole('Admin')) {
            $posts = Post::latest()->with('category')->paginate(15);
        }
        return view('admin.post.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::get();
        return view('admin.post.create', compact('categories'));
    }
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'meta_title'=> 'required|max:60',
            'meta_description'=> 'required|max:160',
            'title'=> 'required',
            'description'=> 'required',

            'category_id'=> 'required',
            'file'=> 'required',
            'link'=> 'required',

            'deadline_submit' => 'required',
            'end_time_submit' => 'required',
            'tags' => 'required',
        ]);

        $post = $post->my_store($request);
        return redirect()->route('posts.edit', $post)->with('toast_success', 'Publicación registrada.');
    }
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $array1 = $post->tags->pluck('name');
        foreach ($array1 as $key => $ar) {
            $results[] = $ar;
        }
        $tags = implode(",", $results);
        // dd($tags);
        if (auth()->user()->hasRole('Client')) {
            $this->authorize('pass', $post);
        }
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
    public function update(Request $request, Post $post)
    {
        if (auth()->user()->hasRole('Client')) {
            $this->authorize('pass', $post);
        }

        $request->validate([
            'meta_title'=> 'required|max:60',
            'meta_description'=> 'required|max:160',
            'title'=> 'required',
            'description'=> 'required',

            'category_id'=> 'required',
            
            'link'=> 'required',
            'deadline_submit'=> 'required',
            'tags' => 'required',
        ]);

        $post->my_update($request);
        return redirect()->route('posts.edit', $post)->with('toast_success', 'Publicación actualizada.');
    }
    public function destroy(Post $post)
    {
        if (auth()->user()->hasRole('Client')) {
            $this->authorize('pass', $post);
        }
        $post->delete();
        return redirect()->back()->with('toast_success', 'Publicación eliminada');
    }
}
