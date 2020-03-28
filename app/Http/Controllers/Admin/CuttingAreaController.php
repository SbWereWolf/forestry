<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CuttingArea\BulkDestroyCuttingArea;
use App\Http\Requests\Admin\CuttingArea\DestroyCuttingArea;
use App\Http\Requests\Admin\CuttingArea\IndexCuttingArea;
use App\Http\Requests\Admin\CuttingArea\StoreCuttingArea;
use App\Http\Requests\Admin\CuttingArea\UpdateCuttingArea;
use App\Models\CuttingArea;
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

class CuttingAreaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCuttingArea $request
     * @return array|Factory|View
     */
    public function index(IndexCuttingArea $request)
    {
        DB::statement('truncate table cutting_area');
        DB::statement('
insert into cutting_area (wood_specie_id, ripeness, first_age, second_age, avrg_increase, substance, cutting_turnover)
select ws.id,
       (-- Лесосека по спелости
           select sum(f.forest_fund) / ws.calculation_period
           from forest_resources f
           where f.wood_specie_id = ws.id
             and (select code from timber_class ts where ts.id = f.timber_class_id)
                     * ws.calculation_period > ws.timber_harvesting_age
       ) as ripeness,
       (-- Первая возрастная
           select sum(f.forest_fund) / (ws.calculation_period * 2)
           from forest_resources f
           where f.wood_specie_id = ws.id
             and (select code + 1 from timber_class ts where ts.id = f.timber_class_id)
                     * ws.calculation_period > ws.timber_harvesting_age
       ) as first_age,
       (-- Вторая возрастная
           select sum(f.forest_fund) / (ws.calculation_period * 3)
           from forest_resources f
           where f.wood_specie_id = ws.id
             and (select code + 2 from timber_class ts where ts.id = f.timber_class_id)
                     * ws.calculation_period > ws.timber_harvesting_age
       ) as second_age,
       (-- По среднему приросту
           select
                   ((sum(f.wood_stock)/sum(f.forest_fund ))
           /(sum(f.forest_fund*(select code from timber_class tc where tc.id = f.timber_class_id))
                       /sum(f.forest_fund )*ws.calculation_period))
           /(           select
               sum(f.forest_fund )
           from
               forest_resources f
           where f.wood_specie_id = ws.id
             and (select code from timber_class ts where ts.id = f.timber_class_id)
                     * ws.calculation_period >= ws.timber_harvesting_age
                     and exists(select null from bonitet b where b.id = f.bonitet_id and code between 1 and 3))
           from
               forest_resources f
           where f.wood_specie_id = ws.id
       ) as avrg_increase,
       (-- По состоянию
           select sum(f.forest_fund) / ws.calculation_period
           from forest_resources f
           where f.wood_specie_id = ws.id
             and f.timber_class_id = (select max(code) from timber_class)
       ) as substance,
       (-- По обороту рубки
           select sum(f.forest_fund) / ws.main_harvesting_age
           from forest_resources f
           where f.wood_specie_id = ws.id
             and exists(select null from bonitet b where b.id = f.bonitet_id and b.code between 1 and 3)
       ) as cutting_turnover
from wood_specie ws
');
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CuttingArea::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['avrg_increase', 'cutting_turnover', 'first_age', 'id', 'ripeness', 'second_age', 'substance', 'wood_specie_id'],

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

        return view('admin.cutting-area.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cutting-area.create');

        return view('admin.cutting-area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCuttingArea $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCuttingArea $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CuttingArea
        $cuttingArea = CuttingArea::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/cutting-areas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/cutting-areas');
    }

    /**
     * Display the specified resource.
     *
     * @param CuttingArea $cuttingArea
     * @throws AuthorizationException
     * @return void
     */
    public function show(CuttingArea $cuttingArea)
    {
        $this->authorize('admin.cutting-area.show', $cuttingArea);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CuttingArea $cuttingArea
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CuttingArea $cuttingArea)
    {
        $this->authorize('admin.cutting-area.edit', $cuttingArea);


        return view('admin.cutting-area.edit', [
            'cuttingArea' => $cuttingArea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCuttingArea $request
     * @param CuttingArea $cuttingArea
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCuttingArea $request, CuttingArea $cuttingArea)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CuttingArea
        $cuttingArea->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/cutting-areas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/cutting-areas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCuttingArea $request
     * @param CuttingArea $cuttingArea
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCuttingArea $request, CuttingArea $cuttingArea)
    {
        $cuttingArea->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCuttingArea $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCuttingArea $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CuttingArea::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
