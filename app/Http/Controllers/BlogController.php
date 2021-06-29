<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Corcel\Model\Post;

class BlogController extends Controller
{
    //

    public function index()
    {
        $posts = Post::published()->get();
       
        return view('blog.index', ['posts'=>$posts]);
    }


    public function single(Request $request)
    {
        return view('blog.single');
    }

    
}
