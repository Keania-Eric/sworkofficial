<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NavItem\BulkDestroyNavItem;
use App\Http\Requests\Admin\NavItem\DestroyNavItem;
use App\Http\Requests\Admin\NavItem\IndexNavItem;
use App\Http\Requests\Admin\NavItem\StoreNavItem;
use App\Http\Requests\Admin\NavItem\UpdateNavItem;
use App\Models\NavItem;
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

class NavItemsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexNavItem $request
     * @return array|Factory|View
     */
    public function index(IndexNavItem $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(NavItem::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name', 'slug']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.nav-item.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.nav-item.create');

        return view('admin.nav-item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNavItem $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreNavItem $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the NavItem
        $navItem = NavItem::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/nav-items'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/nav-items');
    }

    /**
     * Display the specified resource.
     *
     * @param NavItem $navItem
     * @throws AuthorizationException
     * @return void
     */
    public function show(NavItem $navItem)
    {
        $this->authorize('admin.nav-item.show', $navItem);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param NavItem $navItem
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(NavItem $navItem)
    {
        $this->authorize('admin.nav-item.edit', $navItem);


        return view('admin.nav-item.edit', [
            'navItem' => $navItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNavItem $request
     * @param NavItem $navItem
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateNavItem $request, NavItem $navItem)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values NavItem
        $navItem->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/nav-items'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/nav-items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyNavItem $request
     * @param NavItem $navItem
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyNavItem $request, NavItem $navItem)
    {
        $navItem->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyNavItem $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyNavItem $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    NavItem::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
