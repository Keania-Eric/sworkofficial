<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Requests\PostCommentRequest;
use Illuminate\Validation\ValidationException;


class BlogController extends Controller
{
    //
    
    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        $posts  = Post::published()->latest()->paginate(6);
        $featuredPost = Post::whereFeatured(true)->first();
        return view('blog.index', ['posts'=> $posts, 'featuredPost'=> $featuredPost]);
    }
    
    /**
     * Method indexByTag
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function indexByTag(Request $request)
    {
        $posts  = Post::withAnyTag([$request->tag])->published()->latest()->paginate(6);
        return view('blog.tag', ['posts'=> $posts, 'tag'=> $request->tag]);
    }
    
    /**
     * Method indexBySearch
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function indexBySearch(Request $request)
    {
        $query = $request->search;
        $posts  = Post::published()->where('title', 'like', '%'.$query.'%')->latest()->paginate(6);
        return view('blog.search', ['posts'=> $posts, 'search'=> $query]);
    }
    
    /**
     * Method indexByCategory
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function indexByCategory(Request $request)
    {
        $category = PostCategory::find($request->id);
        $posts  = $category->posts()->published()->latest()->paginate(6);
        return view('blog.category', ['posts'=> $posts, 'category'=> $category]);
    }

    
    /**
     * Method single
     *
     * @param \Illuminate\Http\Request $request [explicite description]
     *
     * @return \Illumiante\Http\Response
     */
    public function single(Request $request)
    {
        $post = Post::with('comments')->whereSlug($request->slug)->first();
        $tags = Post::existingTags();
        $recentPosts = Post::published()->latest()->take(3)->get();
        if(!$post) { abort(404);}
        $categories = PostCategory::all();
      
        return view('blog.single', ['post'=> $post, 'categories'=> $categories, 'tags'=>$tags, 'recentPosts'=> $recentPosts]);

    }
    
    /**
     * Method comment
     *
     * @param \App\Http\Request\PostCommentRequest $request [explicite description]
     * @param \App\Models\Post $post [explicite description]
     *
     * @return void
     */
    public function comment(PostCommentRequest $request, Post $post)
    {
        try {
            
            $data = $request->getSanitized();

            $post->comments()->create($data);

            return redirect()->back()->with('success', 'Comment Added');

        }catch(ValidationException $e) {
            return redirect()->back()->with('error', $e->errors()->first());
        }catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    /**
     * Method reply
     *
     * @param \App\Http\Request\PostCommentRequest $request [explicite description]
     *
     * @return \Illuminate\Http\Response
     */
    public function reply(PostCommentRequest $request)
    {
        try {
            $comment = PostComment::find($request->id);
            $data = $request->getSanitized();
            $data['commentable_id'] = $comment->commentable->id;
            $data['commentable_type'] = get_class($comment->commentable);

            $comment->replies()->create($data);

            return redirect()->back()->with('success', 'Comment Added');

        }catch(ValidationException $e) {
            return redirect()->back()->with('error', $e->errors()->first());
        }catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
}
