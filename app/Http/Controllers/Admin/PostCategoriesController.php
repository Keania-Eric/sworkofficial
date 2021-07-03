<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCategory\BulkDestroyPostCategory;
use App\Http\Requests\Admin\PostCategory\DestroyPostCategory;
use App\Http\Requests\Admin\PostCategory\IndexPostCategory;
use App\Http\Requests\Admin\PostCategory\StorePostCategory;
use App\Http\Requests\Admin\PostCategory\UpdatePostCategory;
use App\Models\PostCategory;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostCategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPostCategory $request
     * @return array|Factory|View
     */
    public function index(IndexPostCategory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PostCategory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.post-category.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.post-category.create');

        return view('admin.post-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostCategory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePostCategory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PostCategory
        $postCategory = PostCategory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/post-categories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/post-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param PostCategory $postCategory
     * @throws AuthorizationException
     * @return void
     */
    public function show(PostCategory $postCategory)
    {
        $this->authorize('admin.post-category.show', $postCategory);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PostCategory $postCategory
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PostCategory $postCategory)
    {
        $this->authorize('admin.post-category.edit', $postCategory);


        return view('admin.post-category.edit', [
            'postCategory' => $postCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostCategory $request
     * @param PostCategory $postCategory
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePostCategory $request, PostCategory $postCategory)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PostCategory
        $postCategory->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/post-categories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/post-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPostCategory $request
     * @param PostCategory $postCategory
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPostCategory $request, PostCategory $postCategory)
    {
        $postCategory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPostCategory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPostCategory $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PostCategory::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
