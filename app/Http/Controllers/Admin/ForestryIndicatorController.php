<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ForestryIndicator\IndexForestryIndicator;
use App\Models\ForestryIndicator;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
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
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ForestryIndicator::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['avrg_bonitet', 'avrg_class', 'avrg_increase', 'avrg_wood_stock', 'economical_section_high', 'economical_section_low', 'id', 'operational_fund', 'operational_wood_stock', 'wood_specie_id'],

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

    public function calculate()
    {
        exec('node ' . base_path() . DIRECTORY_SEPARATOR
            . 'cli/calculate-forestry-indicator.js', $output, $code);
    }
}
