@extends('admin.layout.default')

@section('title', trans('admin.wood-specie.actions.index'))

@section('body')

    <wood-specie-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/wood-species') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.wood-specie.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0"
                           href="{{ url('admin/wood-species/create') }}" role="button"><i
                                class="fa fa-plus"></i>&nbsp; {{ trans('admin.wood-specie.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <table class="table table-hover table-listing">
                                <thead>
                                <tr>
                                    <th class="bulk-checkbox">
                                        <input class="form-check-input" id="enabled" type="checkbox"
                                               v-model="isClickedAll" v-validate="''" data-vv-name="enabled"
                                               name="enabled_fake_element"
                                               @click="onBulkItemsClickedAllWithPagination()">
                                        <label class="form-check-label" for="enabled">
                                            #
                                        </label>
                                    </th>

                                    <th is='sortable'
                                        :column="'title'">{{ trans('admin.wood-specie.columns.title') }}</th>
                                    <th is='sortable'
                                        :column="'calculation_period'">{{ trans('admin.wood-specie.columns.calculation_period') }}</th>
                                    <th is='sortable'
                                        :column="'timber_harvesting_age'">{{ trans('admin.wood-specie.columns.timber_harvesting_age') }}</th>
                                    <th is='sortable'
                                        :column="'main_harvesting_age'">{{ trans('admin.wood-specie.columns.main_harvesting_age') }}</th>

                                    <th></th>
                                </tr>
                                <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                    <td class="bg-bulk-info d-table-cell text-center" colspan="8">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a
                                                    href="#" class="text-primary"
                                                    @click="onBulkItemsClickedAll('/admin/wood-species')"
                                                    v-if="(clickedBulkItemsCount < pagination.state.total)"> <i
                                                        class="fa"
                                                        :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span
                                                    class="text-primary">|</span> <a
                                                    href="#" class="text-primary"
                                                    @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                        <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3"
                                                        @click="bulkDelete('/admin/wood-species/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, index) in collection" :key="item.id"
                                    :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                    <td class="bulk-checkbox">
                                        <input class="form-check-input" :id="'enabled' + item.id" type="checkbox"
                                               v-model="bulkItems[item.id]" v-validate="''"
                                               :data-vv-name="'enabled' + item.id"
                                               :name="'enabled' + item.id + '_fake_element'"
                                               @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                        <label class="form-check-label" :for="'enabled' + item.id">
                                        </label>
                                    </td>

                                    <td>@{{ item.title }}</td>
                                    <td>@{{ item.calculation_period }}</td>
                                    <td>@{{ item.timber_harvesting_age }}</td>
                                    <td>@{{ item.main_harvesting_age }}</td>

                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info"
                                                   :href="item.resource_url + '/edit'"
                                                   title="{{ trans('brackets/admin-ui::admin.btn.edit') }}"
                                                   role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i
                                                        class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
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
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/wood-species/create') }}"
                                   role="button"><i
                                        class="fa fa-plus"></i>&nbsp; {{ trans('admin.wood-specie.actions.create') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </wood-specie-listing>

@endsection
