<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'posts' => Post::orderBy('date', 'desc')->paginate(6)
        ]);
    }

    public function show($idpost)
    {
        $post = Post::where('idpost', $idpost)->first();
        return view('detail', [
            'post' => $post
        ]);
    }
}
