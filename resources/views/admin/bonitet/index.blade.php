@extends('admin.layout.default')

@section('title', trans('admin.bonitet.actions.index'))

@section('body')

    <bonitet-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/bonitets') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.bonitet.actions.index') }}
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>

                                        <th is='sortable' :column="'title'">{{ trans('admin.bonitet.columns.title') }}</th>
                                        <th is='sortable' :column="'code'">{{ trans('admin.bonitet.columns.code') }}</th>
                                        <th is='sortable' :column="'remark'">{{ trans('admin.bonitet.columns.remark') }}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">

                                        <td>@{{ item.title }}</td>
                                        <td>@{{ item.code }}</td>
                                        <td>@{{ item.remark }}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </bonitet-listing>

@endsection
