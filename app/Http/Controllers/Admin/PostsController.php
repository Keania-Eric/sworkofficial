<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Post;
use Illuminate\View\View;
use App\Models\PostCategory;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\Admin\Post\IndexPost;
use App\Http\Requests\Admin\Post\StorePost;
use App\Http\Requests\Admin\Post\UpdatePost;
use App\Http\Requests\Admin\Post\DestroyPost;
use Brackets\AdminListing\Facades\AdminListing;
use App\Http\Requests\Admin\Post\BulkDestroyPost;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Auth\Access\AuthorizationException;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPost $request
     * @return array|Factory|View
     */
    public function index(IndexPost $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Post::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'image', 'featured', 'post_category_id', 'author', 'intro_text', 'published_at', 'enabled', 'post_category_id'],

            // set columns to searchIn
            ['id', 'title', 'slug', 'perex', 'image', 'author', 'intro_text', 'post_category.name'],

            function ($query) use ($request) {
                $query->with('category');

                // add this line if you want to search by category attributes
                $query->join('post_categories', 'post_categories.id', '=', 'posts.post_category_id');

                if($request->has('post_categories')){
                    $query->whereIn('post_category_id', $request->get('post_categories'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.post.index', ['data' => $data, 'categories' => PostCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.post.create');

        return view('admin.post.create', ['categories'=> PostCategory::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePost $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePost $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['post_category_id'] = $request->getPostCategoryId();

        // Store the Post
        $post = Post::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/posts'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @throws AuthorizationException
     * @return void
     */
    public function show(Post $post)
    {
        $this->authorize('admin.post.show', $post);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Post $post)
    {
        $this->authorize('admin.post.edit', $post);


        return view('admin.post.edit', [
            'post' => $post,
            'categories'=> PostCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePost $request
     * @param Post $post
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePost $request, Post $post)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        $sanitized['post_category_id'] = $request->getPostCategoryId();

        if($sanitized['featured'] == true) {
            // updated all others as false
            $this->makeAllOtherFeaturedFalse();
        }

        // Update changed values Post
        $post->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/posts'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
                'object' => $post
            ];
        }

        return redirect('admin/posts');
    }

    
    /**
     * Find all featured and set to false first
     *
     * @return void
     */
    protected function makeAllOtherFeaturedFalse()
    {
        Post::where('featured', true)->get()->each(function($post){
            $post->update(['featured'=> false]);
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPost $request
     * @param Post $post
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPost $request, Post $post)
    {
        $post->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPost $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPost $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Post::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
