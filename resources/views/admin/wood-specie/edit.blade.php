@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.wood-specie.actions.edit', ['name' => $woodSpecie->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <wood-specie-form
                :action="'{{ $woodSpecie->resource_url }}'"
                :data="{{ $woodSpecie->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.wood-specie.actions.edit', ['name' => $woodSpecie->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.wood-specie.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </wood-specie-form>

        </div>
    
</div>

@endsection