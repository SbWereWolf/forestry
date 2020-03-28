@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.cutting-area.actions.edit', ['name' => $cuttingArea->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <cutting-area-form
                :action="'{{ $cuttingArea->resource_url }}'"
                :data="{{ $cuttingArea->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.cutting-area.actions.edit', ['name' => $cuttingArea->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.cutting-area.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </cutting-area-form>

        </div>
    
</div>

@endsection