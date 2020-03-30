@extends('admin.layout.default')

@section('title', trans('admin.forest-resource.actions.create'))

@section('body')

    <div class="container-xl">

        <div class="card">

            <forest-resource-form
                :action="'{{ url('admin/forest-resources') }}'"
                :wood_species="{{$woodSpecies->toJson()}}"
                :timber_classes="{{$timberClasses->toJson()}}"
                :bonitets="{{$bonitets->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>

                    <div class="card-header">
                        <i class="fa fa-plus"></i> {{ trans('admin.forest-resource.actions.create') }}
                    </div>

                    <div class="card-body">
                        @include('admin.forest-resource.components.elements-for-create')
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
