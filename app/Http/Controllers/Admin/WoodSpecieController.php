<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WoodSpecie\BulkDestroyWoodSpecie;
use App\Http\Requests\Admin\WoodSpecie\DestroyWoodSpecie;
use App\Http\Requests\Admin\WoodSpecie\IndexWoodSpecie;
use App\Http\Requests\Admin\WoodSpecie\StoreWoodSpecie;
use App\Http\Requests\Admin\WoodSpecie\UpdateWoodSpecie;
use App\Models\WoodSpecie;
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

class WoodSpecieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexWoodSpecie $request
     * @return array|Factory|View
     */
    public function index(IndexWoodSpecie $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(WoodSpecie::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['calculation_period', 'id', 'main_harvesting_age', 'timber_harvesting_age', 'title'],

            // set columns to searchIn
            ['id', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.wood-specie.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.wood-specie.create');

        return view('admin.wood-specie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWoodSpecie $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreWoodSpecie $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the WoodSpecie
        $woodSpecie = WoodSpecie::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/wood-species'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/wood-species');
    }

    /**
     * Display the specified resource.
     *
     * @param WoodSpecie $woodSpecie
     * @throws AuthorizationException
     * @return void
     */
    public function show(WoodSpecie $woodSpecie)
    {
        $this->authorize('admin.wood-specie.show', $woodSpecie);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WoodSpecie $woodSpecie
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(WoodSpecie $woodSpecie)
    {
        $this->authorize('admin.wood-specie.edit', $woodSpecie);


        return view('admin.wood-specie.edit', [
            'woodSpecie' => $woodSpecie,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWoodSpecie $request
     * @param WoodSpecie $woodSpecie
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateWoodSpecie $request, WoodSpecie $woodSpecie)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values WoodSpecie
        $woodSpecie->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/wood-species'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/wood-species');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyWoodSpecie $request
     * @param WoodSpecie $woodSpecie
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyWoodSpecie $request, WoodSpecie $woodSpecie)
    {
        $woodSpecie->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyWoodSpecie $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyWoodSpecie $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    WoodSpecie::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
