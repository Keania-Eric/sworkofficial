<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TaggingTag\BulkDestroyTaggingTag;
use App\Http\Requests\Admin\TaggingTag\DestroyTaggingTag;
use App\Http\Requests\Admin\TaggingTag\IndexTaggingTag;
use App\Http\Requests\Admin\TaggingTag\StoreTaggingTag;
use App\Http\Requests\Admin\TaggingTag\UpdateTaggingTag;
use App\Models\TaggingTag;
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

class TaggingTagsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTaggingTag $request
     * @return array|Factory|View
     */
    public function index(IndexTaggingTag $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TaggingTag::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'suggest', 'count', 'tag_group_id'],

            // set columns to searchIn
            ['id', 'slug', 'name', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tagging-tag.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tagging-tag.create');

        return view('admin.tagging-tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTaggingTag $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTaggingTag $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TaggingTag
        $taggingTag = TaggingTag::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tagging-tags'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tagging-tags');
    }

    /**
     * Display the specified resource.
     *
     * @param TaggingTag $taggingTag
     * @throws AuthorizationException
     * @return void
     */
    public function show(TaggingTag $taggingTag)
    {
        $this->authorize('admin.tagging-tag.show', $taggingTag);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TaggingTag $taggingTag
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TaggingTag $taggingTag)
    {
        $this->authorize('admin.tagging-tag.edit', $taggingTag);


        return view('admin.tagging-tag.edit', [
            'taggingTag' => $taggingTag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTaggingTag $request
     * @param TaggingTag $taggingTag
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTaggingTag $request, TaggingTag $taggingTag)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TaggingTag
        $taggingTag->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tagging-tags'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tagging-tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTaggingTag $request
     * @param TaggingTag $taggingTag
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTaggingTag $request, TaggingTag $taggingTag)
    {
        $taggingTag->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTaggingTag $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTaggingTag $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TaggingTag::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
