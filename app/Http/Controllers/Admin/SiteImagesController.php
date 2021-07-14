<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteImage\BulkDestroySiteImage;
use App\Http\Requests\Admin\SiteImage\DestroySiteImage;
use App\Http\Requests\Admin\SiteImage\IndexSiteImage;
use App\Http\Requests\Admin\SiteImage\StoreSiteImage;
use App\Http\Requests\Admin\SiteImage\UpdateSiteImage;
use App\Models\SiteImage;
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

class SiteImagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSiteImage $request
     * @return array|Factory|View
     */
    public function index(IndexSiteImage $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SiteImage::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'width', 'height'],

            // set columns to searchIn
            ['id', 'name', 'slug', 'width', 'height']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.site-image.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.site-image.create');

        return view('admin.site-image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSiteImage $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSiteImage $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SiteImage
        $siteImage = SiteImage::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/site-images'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/site-images');
    }

    /**
     * Display the specified resource.
     *
     * @param SiteImage $siteImage
     * @throws AuthorizationException
     * @return void
     */
    public function show(SiteImage $siteImage)
    {
        $this->authorize('admin.site-image.show', $siteImage);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SiteImage $siteImage
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SiteImage $siteImage)
    {
        $this->authorize('admin.site-image.edit', $siteImage);


        return view('admin.site-image.edit', [
            'siteImage' => $siteImage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSiteImage $request
     * @param SiteImage $siteImage
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSiteImage $request, SiteImage $siteImage)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
       
        // Update changed values SiteImage
        $siteImage->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/site-images'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/site-images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySiteImage $request
     * @param SiteImage $siteImage
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySiteImage $request, SiteImage $siteImage)
    {
        $siteImage->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySiteImage $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySiteImage $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SiteImage::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
