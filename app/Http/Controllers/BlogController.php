<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    //

    public function index()
    {
        $posts  = Post::published()->latest()->paginate(6);
        $featuredPost = Post::whereFeatured(true)->first();
        return view('blog.index', ['posts'=> $posts, 'featuredPost'=> $featuredPost]);
    }


    public function single(Request $request)
    {
        $post = Post::whereSlug($request->slug)->first();
        if(!$post) { abort(404);}
        $categories = PostCategory::all();
        return view('blog.single', ['post'=> $post, 'categories'=> $categories]);

    }
    
}
