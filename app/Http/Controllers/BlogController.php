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

    public function indexByTag(Request $request)
    {
        $posts  = Post::withAnyTag([$request->tag])->published()->latest()->paginate(6);
        return view('blog.tag', ['posts'=> $posts, 'tag'=> $request->tag]);
    }

    public function indexBySearch(Request $request)
    {
        $query = $request->search;
        $posts  = Post::published()->where('title', 'like', '%'.$query.'%')->latest()->paginate(6);
        return view('blog.search', ['posts'=> $posts, 'search'=> $query]);
    }

    public function indexByCategory(Request $request)
    {
        $category = PostCategory::find($request->id);
        $posts  = $category->posts()->published()->latest()->paginate(6);
        return view('blog.category', ['posts'=> $posts, 'category'=> $category]);
    }


    public function single(Request $request)
    {
        $post = Post::whereSlug($request->slug)->first();
        $tags = Post::existingTags();
        $recentPosts = Post::published()->latest()->take(3)->get();
        if(!$post) { abort(404);}
        $categories = PostCategory::all();
        return view('blog.single', ['post'=> $post, 'categories'=> $categories, 'tags'=>$tags, 'recentPosts'=> $recentPosts]);

    }
    
}
