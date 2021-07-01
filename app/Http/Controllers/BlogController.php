<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    //

    public function index()
    {
        $posts  = Post::latest()->take(10)->get();
        $featuredPost = Post::whereFeatured(true)->first();
        return view('blog.index', ['posts'=> $posts, 'featuredPost'=> $featuredPost]);
    }


    public function single(Request $request)
    {
        return view('blog.single');
    }

    
}
