<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ForestryIndicator\BulkDestroyForestryIndicator;
use App\Http\Requests\Admin\ForestryIndicator\DestroyForestryIndicator;
use App\Http\Requests\Admin\ForestryIndicator\IndexForestryIndicator;
use App\Http\Requests\Admin\ForestryIndicator\StoreForestryIndicator;
use App\Http\Requests\Admin\ForestryIndicator\UpdateForestryIndicator;
use App\Models\ForestryIndicator;
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

class ForestryIndicatorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexForestryIndicator $request
     * @return array|Factory|View
     */
    public function index(IndexForestryIndicator $request)
    {
        DB::statement('truncate table forestry_indicator');
        DB::statement('
insert into forestry_indicator
    ( wood_specie_id, avrg_bonitet, avrg_class, avrg_wood_stock, avrg_increase, operational_fund, operational_wood_stock, economical_section_high, economical_section_low)
select
       ws.id,
       (-- Средний уровень бонитета
           select
                  sum(f.forest_fund*(select code from bonitet b where b.id = f.bonitet_id))
           /sum(f.forest_fund )
           from
           forest_resources f
           where f.wood_specie_id = ws.id
           ) as avrg_bonitet,
       (-- Средний возраст класс древесины
           select
                       sum(f.forest_fund*(select code from timber_class tc where tc.id = f.timber_class_id))
                       /sum(f.forest_fund )*ws.calculation_period
           from
               forest_resources f
           where f.wood_specie_id = ws.id
       ) as avrg_class,
       (-- Средний запас
           select
                   sum(f.wood_stock)
                   /sum(f.forest_fund )
           from
               forest_resources f
           where f.wood_specie_id = ws.id
       ) as avrg_wood_stock,
       (-- Средний прирост
           select
                   (sum(f.wood_stock)/sum(f.forest_fund ))
           /(sum(f.forest_fund*(select code from timber_class tc where tc.id = f.timber_class_id))
                       /sum(f.forest_fund )*ws.calculation_period)
           from
               forest_resources f
           where f.wood_specie_id = ws.id
       ) as avrg_increase,
       (-- Эксплуатационный фонд
           select
               sum(f.forest_fund )
           from
               forest_resources f
           where f.wood_specie_id = ws.id
             and (select code from timber_class ts where ts.id = f.timber_class_id)
                     * ws.calculation_period >= ws.timber_harvesting_age
                     and exists(select null from bonitet b where b.id = f.bonitet_id and code between 1 and 3)
       ) as operational_fund,
       (-- Эксплуатационный запас
           select
               sum(f.wood_stock )
           from
               forest_resources f
           where f.wood_specie_id = ws.id
             and (select code from timber_class ts where ts.id = f.timber_class_id)
                     * ws.calculation_period >= ws.timber_harvesting_age
                     and exists(select null from bonitet b where b.id = f.bonitet_id and code between 1 and 3)
       ) as operational_wood_stock,
       (-- Хозяйственные секций 1-3
           select
               sum(f.forest_fund )
           from
               forest_resources f
           where f.wood_specie_id = ws.id
             and exists(select null from bonitet b where b.id = f.bonitet_id and code between 1 and 3)

       ) as economical_section_high,
       (-- Хозяйственные секций остальные
           select
               sum(f.forest_fund )
           from
               forest_resources f
           where f.wood_specie_id = ws.id
             and exists(select null from bonitet b where b.id = f.bonitet_id and code not between 1 and 3)

       ) as economical_section_low
from
     wood_specie ws
');

        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ForestryIndicator::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['avrg_bonitet', 'avrg_class', 'avrg_increase', 'avrg_wood_stock', 'economical_section_high', 'economical_section_low', 'id', 'operational_fund', 'operational_wood_stock', 'wood_specie_id'],

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

        return view('admin.forestry-indicator.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.forestry-indicator.create');

        return view('admin.forestry-indicator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreForestryIndicator $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreForestryIndicator $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ForestryIndicator
        $forestryIndicator = ForestryIndicator::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/forestry-indicators'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/forestry-indicators');
    }

    /**
     * Display the specified resource.
     *
     * @param ForestryIndicator $forestryIndicator
     * @throws AuthorizationException
     * @return void
     */
    public function show(ForestryIndicator $forestryIndicator)
    {
        $this->authorize('admin.forestry-indicator.show', $forestryIndicator);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ForestryIndicator $forestryIndicator
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ForestryIndicator $forestryIndicator)
    {
        $this->authorize('admin.forestry-indicator.edit', $forestryIndicator);


        return view('admin.forestry-indicator.edit', [
            'forestryIndicator' => $forestryIndicator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateForestryIndicator $request
     * @param ForestryIndicator $forestryIndicator
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateForestryIndicator $request, ForestryIndicator $forestryIndicator)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ForestryIndicator
        $forestryIndicator->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/forestry-indicators'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/forestry-indicators');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyForestryIndicator $request
     * @param ForestryIndicator $forestryIndicator
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyForestryIndicator $request, ForestryIndicator $forestryIndicator)
    {
        $forestryIndicator->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyForestryIndicator $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyForestryIndicator $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ForestryIndicator::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
