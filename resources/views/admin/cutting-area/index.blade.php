@extends('admin.layout.default')

@section('title', trans('admin.cutting-area.actions.index'))

@section('body')

    <cutting-area-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/cutting-areas') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.cutting-area.actions.index') }}
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-end">
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                <tr>
                                    <th is='sortable'
                                        :column="'wood_specie_id'">{{ trans('admin.cutting-area.columns.wood_specie_id') }}</th>
                                    <th is='sortable'
                                        :column="'ripeness'">{{ trans('admin.cutting-area.columns.ripeness') }}</th>
                                    <th is='sortable'
                                        :column="'first_age'">{{ trans('admin.cutting-area.columns.first_age') }}</th>
                                    <th is='sortable'
                                        :column="'second_age'">{{ trans('admin.cutting-area.columns.second_age') }}</th>
                                    <th is='sortable'
                                        :column="'avrg_increase'">{{ trans('admin.cutting-area.columns.avrg_increase') }}</th>
                                    <th is='sortable'
                                        :column="'substance'">{{ trans('admin.cutting-area.columns.substance') }}</th>
                                    <th is='sortable'
                                        :column="'cutting_turnover'">{{ trans('admin.cutting-area.columns.cutting_turnover') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, index) in collection" :key="item.id">

                                    <td>@{{ item.wood_specie.title }}</td>
                                    <td>@{{ item.ripeness }}</td>
                                    <td>@{{ item.first_age }}</td>
                                    <td>@{{ item.second_age }}</td>
                                    <td>@{{ item.avrg_increase }}</td>
                                    <td>@{{ item.substance }}</td>
                                    <td>@{{ item.cutting_turnover }}</td>

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
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/cutting-areas/create') }}"
                                   role="button"><i
                                        class="fa fa-plus"></i>&nbsp; {{ trans('admin.cutting-area.actions.create') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </cutting-area-listing>

@endsection
