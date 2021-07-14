<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteMeta\BulkDestroySiteMeta;
use App\Http\Requests\Admin\SiteMeta\DestroySiteMeta;
use App\Http\Requests\Admin\SiteMeta\IndexSiteMeta;
use App\Http\Requests\Admin\SiteMeta\StoreSiteMeta;
use App\Http\Requests\Admin\SiteMeta\UpdateSiteMeta;
use App\Models\SiteMeta;
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

class SiteMetasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSiteMeta $request
     * @return array|Factory|View
     */
    public function index(IndexSiteMeta $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SiteMeta::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name', 'value']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.site-meta.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.site-meta.create');

        return view('admin.site-meta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSiteMeta $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSiteMeta $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SiteMeta
        $siteMetum = SiteMeta::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/site-metas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/site-metas');
    }

    /**
     * Display the specified resource.
     *
     * @param SiteMeta $siteMetum
     * @throws AuthorizationException
     * @return void
     */
    public function show(SiteMeta $siteMetum)
    {
        $this->authorize('admin.site-meta.show', $siteMetum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SiteMeta $siteMetum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SiteMeta $siteMetum)
    {
        $this->authorize('admin.site-meta.edit', $siteMetum);


        return view('admin.site-meta.edit', [
            'siteMetum' => $siteMetum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSiteMeta $request
     * @param SiteMeta $siteMetum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSiteMeta $request, SiteMeta $siteMetum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SiteMeta
        $siteMetum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/site-metas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/site-metas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySiteMeta $request
     * @param SiteMeta $siteMetum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySiteMeta $request, SiteMeta $siteMetum)
    {
        $siteMetum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySiteMeta $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySiteMeta $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SiteMeta::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
