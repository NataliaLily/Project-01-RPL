<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('backend.posts.index', compact('posts'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('backend.posts.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'post_title' => 'required',
            'post_content' => 'required',
            'post_image' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $request->file('post_image')->store('public');
        $post_image = $request->file('post_image')->hashName();

        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->post_image = $post_image;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('backend.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'post_title' => 'required',
            'post_content' => 'required',
            'post_image' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $post = Post::findOrFail($request->id);
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->post_image = $request->post_image;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('post.index')->with('posts', 'Post updated successfully');
    }
    public function delete($id)
    {
        $posts = Post::findOrFail($id);
        $posts->delete();
        return redirect()->route('post.index');
    }
}
