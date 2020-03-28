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
insert into forestry_indicator (wood_specie_id, avrg_bonitet, avrg_class, avrg_wood_stock, avrg_increase,
                                operational_fund, operational_wood_stock, economical_section_high,
                                economical_section_low)
select ws.id,
       (-- Средний уровень бонитета
           select sum(f.forest_fund * b.code)
                      / sum(f.forest_fund)
           from forest_resources f
                    join bonitet b on b.id = f.bonitet_id
           where f.wood_specie_id = ws.id
       ) as avrg_bonitet,
       (-- Средний возраст класс древесины
           select sum(f.forest_fund * tc.code)
                      / sum(f.forest_fund) * ws.calculation_period
           from forest_resources f
                    join timber_class tc on tc.id = f.timber_class_id
           where f.wood_specie_id = ws.id
       ) as avrg_class,
       (-- Средний запас
           select sum(f.wood_stock) / sum(f.forest_fund)
           from forest_resources f
           where f.wood_specie_id = ws.id
       ) as avrg_wood_stock,
       (-- Средний прирост
           select (sum(f.wood_stock) / sum(f.forest_fund)) -- Средний запас
                      / (sum(f.forest_fund * tc.code)
                             / sum(f.forest_fund) * ws.calculation_period) -- Средний возраст класс древесины
           from forest_resources f
                    join timber_class tc on tc.id = f.timber_class_id
           where f.wood_specie_id = ws.id
       ) as avrg_increase,
       (-- Эксплуатационный фонд
           select sum(f.forest_fund)
           from forest_resources f
                    join bonitet b on b.id = f.bonitet_id
                    join timber_class tc on tc.id = f.timber_class_id
           where f.wood_specie_id = ws.id
             and b.code between 1 and 3
             and tc.code * ws.calculation_period >= ws.timber_harvesting_age
       ) as operational_fund,
       (-- Эксплуатационный запас
           select sum(f.wood_stock)
           from forest_resources f
                    join bonitet b on b.id = f.bonitet_id
                    join timber_class tc on tc.id = f.timber_class_id
           where f.wood_specie_id = ws.id
             and b.code between 1 and 3
             and tc.code * ws.calculation_period >= ws.timber_harvesting_age
       ) as operational_wood_stock,
       (-- Хозяйственные секций 1-3
           select sum(f.forest_fund)
           from forest_resources f
                    join bonitet b on b.id = f.bonitet_id
           where f.wood_specie_id = ws.id
             and b.code between 1 and 3
       ) as economical_section_high,
       (-- Хозяйственные секций остальные
           select sum(f.forest_fund)
           from forest_resources f
                    join bonitet b on b.id = f.bonitet_id
           where f.wood_specie_id = ws.id
             and b.code NOT between 1 and 3
       ) as economical_section_low
from wood_specie ws
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
}
