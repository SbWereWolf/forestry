<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TimberClass\IndexTimberClass;
use App\Models\TimberClass;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class TimberClassController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTimberClass $request
     * @return array|Factory|View
     */
    public function index(IndexTimberClass $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TimberClass::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['code', 'id', 'remark', 'title'],

            // set columns to searchIn
            ['code', 'id', 'remark', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.timber-class.index', ['data' => $data]);
    }
}
