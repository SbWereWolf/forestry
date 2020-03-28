@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.forestry-indicator.actions.edit', ['name' => $forestryIndicator->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <forestry-indicator-form
                :action="'{{ $forestryIndicator->resource_url }}'"
                :data="{{ $forestryIndicator->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.forestry-indicator.actions.edit', ['name' => $forestryIndicator->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.forestry-indicator.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </forestry-indicator-form>

        </div>
    
</div>

@endsection