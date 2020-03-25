<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ForestResource\BulkDestroyForestResource;
use App\Http\Requests\Admin\ForestResource\DestroyForestResource;
use App\Http\Requests\Admin\ForestResource\IndexForestResource;
use App\Http\Requests\Admin\ForestResource\StoreForestResource;
use App\Http\Requests\Admin\ForestResource\UpdateForestResource;
use App\Models\ForestResource;
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

class ForestResourcesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexForestResource $request
     * @return array|Factory|View
     */
    public function index(IndexForestResource $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ForestResource::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['bonitet_id', 'forest_fund', 'id', 'timber_class_id', 'wood_specie_id', 'wood_stock'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.forest-resource.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.forest-resource.create');

        return view('admin.forest-resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreForestResource $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreForestResource $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ForestResource
        $forestResource = ForestResource::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/forest-resources'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/forest-resources');
    }

    /**
     * Display the specified resource.
     *
     * @param ForestResource $forestResource
     * @throws AuthorizationException
     * @return void
     */
    public function show(ForestResource $forestResource)
    {
        $this->authorize('admin.forest-resource.show', $forestResource);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ForestResource $forestResource
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ForestResource $forestResource)
    {
        $this->authorize('admin.forest-resource.edit', $forestResource);


        return view('admin.forest-resource.edit', [
            'forestResource' => $forestResource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateForestResource $request
     * @param ForestResource $forestResource
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateForestResource $request, ForestResource $forestResource)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ForestResource
        $forestResource->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/forest-resources'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/forest-resources');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyForestResource $request
     * @param ForestResource $forestResource
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyForestResource $request, ForestResource $forestResource)
    {
        $forestResource->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyForestResource $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyForestResource $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ForestResource::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
