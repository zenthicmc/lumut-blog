<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('dashboard.post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);

        Post::insert([
            'title' => $request->title,
            'content' => $request->content,
            'date' => date('Y-m-d H:i:s'),
            'username' => session('account')['username'],
        ]);

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        $post = Post::where('idpost', $id)->first();
        return view('dashboard.post.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);

        Post::where('idpost', $id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'date' => date('Y-m-d H:i:s'),
            'username' => session('account')['username'],
        ]);

        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        Post::where('idpost', $id)->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
