<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CuttingArea\IndexCuttingArea;
use App\Models\CuttingArea;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
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
                    join timber_class tc on tc.id = f.timber_class_id
           where f.wood_specie_id = ws.id
             and tc.code * ws.calculation_period > ws.timber_harvesting_age
       ) as ripeness,
       (-- Первая возрастная
           select sum(f.forest_fund) / (ws.calculation_period * 2)
           from forest_resources f
                    join timber_class tc on tc.id = f.timber_class_id
           where f.wood_specie_id = ws.id
             and (tc.code + 1) * ws.calculation_period > ws.timber_harvesting_age
       ) as first_age,
       (-- Вторая возрастная
           select sum(f.forest_fund) / (ws.calculation_period * 3)
           from forest_resources f
                    join timber_class tc on tc.id = f.timber_class_id
           where f.wood_specie_id = ws.id
             and (tc.code + 2) * ws.calculation_period > ws.timber_harvesting_age
       ) as second_age,
       (-- По среднему приросту
           select avrg_increase / avrg_operational_wood_stock as cutting_by_increase
           from (
                    select id,
                           avrg_wood_stock,
                           avrg_operational_wood_stock,
                           avrg_class,
                           avrg_wood_stock / avrg_class as avrg_increase
                    from (
                             select id,
                                    avrg_wood_stock,
                                    avrg_operational_wood_stock,
                                    sum_for_each_class,
                                    sum_all_fund,
                                    sum_for_each_class / sum_all_fund as avrg_class
                             from (
                                      select id,
                                             avrg_wood_stock,
                                             operational_wood_stock,
                                             operational_fund,
                                             operational_wood_stock / operational_fund as avrg_operational_wood_stock,
                                             (select sum(f.forest_fund * tc.code) * A.calculation_period
                                              from forest_resources f
                                                       join timber_class tc on tc.id = f.timber_class_id
                                              where f.wood_specie_id = A.id)           as sum_for_each_class,
                                             (select sum(f.forest_fund)
                                              from forest_resources f
                                              where f.wood_specie_id = A.id)           as sum_all_fund
                                      from (
                                               select ws.id                 AS id,
                                                      ws.calculation_period AS calculation_period,
                                                      sum(f.wood_stock)     AS avrg_wood_stock,
                                                      (
                                                          select sum(fs.wood_stock)
                                                          from forest_resources fs
                                                                   join bonitet b
                                                                        on b.id = fs.bonitet_id
                                                                   join timber_class t on fs.timber_class_id = t.id
                                                          where fs.wood_specie_id = ws.id
                                                            and b.code between 1 and 3
                                                            and t.code * ws.calculation_period > ws.timber_harvesting_age
                                                      )                     AS operational_wood_stock,
                                                      (
                                                          select sum(fs.forest_fund)
                                                          from forest_resources fs
                                                                   join bonitet b
                                                                        on b.id = fs.bonitet_id
                                                                   join timber_class t on fs.timber_class_id = t.id
                                                          where fs.wood_specie_id = ws.id
                                                            and b.code between 1 and 3
                                                            and t.code * ws.calculation_period > ws.timber_harvesting_age
                                                      )                     AS operational_fund
                                               from wood_specie ws
                                                        join forest_resources f
                                                             on f.wood_specie_id = ws.id
                                                        join bonitet b
                                                             on b.id = f.bonitet_id
                                               where f.wood_specie_id = ws.id
                                                 and b.code between 1 and 3
                                               group by
                                                        ws.id,
                                                        ws.calculation_period,
                                                        ws.timber_harvesting_age
                                           ) A
                                  ) B
                         ) C
                ) D
           where D.id = ws.id
       ) as avrg_increase,
       (-- По состоянию
           select sum(f.forest_fund) / ws.calculation_period
           from forest_resources f
                    join timber_class tc on tc.id = f.timber_class_id
           where f.wood_specie_id = ws.id
             and tc.code = (select max(code) from timber_class)
       ) as substance,
       (-- По обороту рубки
           select sum(f.forest_fund) / ws.main_harvesting_age
           from forest_resources f
                    join bonitet b on b.id = f.bonitet_id
           where f.wood_specie_id = ws.id
             and b.code between 1 and 3
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
            [],

            function ($query) use ($request) {
                /* @var Builder $query */
                $query->with(['woodSpecie'])
                    ->orderBy('wood_specie_id');
            }
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
     * Display the specified resource.
     *
     * @param CuttingArea $cuttingArea
     * @return void
     * @throws AuthorizationException
     */
    public function show(CuttingArea $cuttingArea)
    {
        $this->authorize('admin.cutting-area.show', $cuttingArea);

        // TODO your code goes here
    }
}
