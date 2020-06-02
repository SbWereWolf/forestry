<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CuttingArea\IndexCuttingArea;
use App\Models\CuttingArea;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
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

    public function calculate()
    {
        exec('node ' . base_path() . DIRECTORY_SEPARATOR
            . 'cli/calculate-cutting-area.js', $output, $code);
    }
}
