@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.forest-resource.actions.edit', ['name' => $forestResource->id]))

@section('body')

    <div class="container-xl">
        <div class="card">
            <forest-resource-form
                :action="'{{ $forestResource->resource_url }}'"
                :data="{{ $forestResource->toJson() }}"
                v-cloak
                inline-template
            >

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.forest-resource.actions.edit', ['name' => $forestResource->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.forest-resource.components.elements-for-edit')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </forest-resource-form>

        </div>

    </div>

@endsection
