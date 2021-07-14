<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteContent\BulkDestroySiteContent;
use App\Http\Requests\Admin\SiteContent\DestroySiteContent;
use App\Http\Requests\Admin\SiteContent\IndexSiteContent;
use App\Http\Requests\Admin\SiteContent\StoreSiteContent;
use App\Http\Requests\Admin\SiteContent\UpdateSiteContent;
use App\Models\SiteContent;
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

class SiteContentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSiteContent $request
     * @return array|Factory|View
     */
    public function index(IndexSiteContent $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SiteContent::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'slug'],

            // set columns to searchIn
            ['content', 'id', 'slug', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }
       
        return view('admin.site-content.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.site-content.create');

        return view('admin.site-content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSiteContent $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSiteContent $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SiteContent
        $siteContent = SiteContent::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/site-contents'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/site-contents');
    }

    /**
     * Display the specified resource.
     *
     * @param SiteContent $siteContent
     * @throws AuthorizationException
     * @return void
     */
    public function show(SiteContent $siteContent)
    {
        $this->authorize('admin.site-content.show', $siteContent);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SiteContent $siteContent
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SiteContent $siteContent)
    {
        $this->authorize('admin.site-content.edit', $siteContent);


        return view('admin.site-content.edit', [
            'siteContent' => $siteContent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSiteContent $request
     * @param SiteContent $siteContent
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSiteContent $request, SiteContent $siteContent)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SiteContent
        $siteContent->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/site-contents'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/site-contents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySiteContent $request
     * @param SiteContent $siteContent
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySiteContent $request, SiteContent $siteContent)
    {
        $siteContent->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySiteContent $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySiteContent $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SiteContent::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
