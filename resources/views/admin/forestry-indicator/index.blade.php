@extends('admin.layout.default')

@section('title', trans('admin.forestry-indicator.actions.index'))

@section('body')

    <forestry-indicator-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/forestry-indicators') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.forestry-indicator.actions.index') }}
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <div class="row justify-content-md-between">
                                <div>
                                    <button type="button" class="btn btn-success" v-on:click="runCalc">
                                        Рассчитать
                                    </button>
                                </div>
                                <form @submit.prevent="">
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <table class="table table-hover table-listing">
                                <thead>
                                <tr>

                                    <th is='sortable'
                                        :column="'wood_specie_id'">{{ trans('admin.forestry-indicator.columns.wood_specie_id') }}</th>
                                    <th is='sortable'
                                        :column="'avrg_bonitet'">{{ trans('admin.forestry-indicator.columns.avrg_bonitet') }}</th>
                                    <th is='sortable'
                                        :column="'avrg_class'">{{ trans('admin.forestry-indicator.columns.avrg_class') }}</th>
                                    <th is='sortable'
                                        :column="'avrg_wood_stock'">{{ trans('admin.forestry-indicator.columns.avrg_volume') }}</th>
                                    <th is='sortable'
                                        :column="'avrg_increase'">{{ trans('admin.forestry-indicator.columns.avrg_increase') }}</th>
                                    <th is='sortable'
                                        :column="'operational_fund'">{{ trans('admin.forestry-indicator.columns.operational_fund') }}</th>
                                    <th is='sortable'
                                        :column="'operational_wood_stock'">{{ trans('admin.forestry-indicator.columns.operational_volume') }}</th>
                                    <th is='sortable'
                                        :column="'economical_section_high'">{{ trans('admin.forestry-indicator.columns.economical_section_high') }}</th>
                                    <th is='sortable'
                                        :column="'economical_section_low'">{{ trans('admin.forestry-indicator.columns.economical_section_low') }}</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, index) in collection" :key="item.id">

                                    <td>@{{ item.wood_specie.title }}</td>
                                    <td>@{{ item.avrg_bonitet }}</td>
                                    <td>@{{ item.avrg_class }}</td>
                                    <td>@{{ item.avrg_wood_stock }}</td>
                                    <td>@{{ item.avrg_increase }}</td>
                                    <td>@{{ item.operational_fund }}</td>
                                    <td>@{{ item.operational_wood_stock }}</td>
                                    <td>@{{ item.economical_section_high }}</td>
                                    <td>@{{ item.economical_section_low }}</td>

                                </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span
                                        class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner"
                                   href="{{ url('admin/forestry-indicators/create') }}" role="button"><i
                                        class="fa fa-plus"></i>&nbsp; {{ trans('admin.forestry-indicator.actions.create') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </forestry-indicator-listing>

@endsection
