<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('wood_specie_id'), 'has-success': this.fields.wood_specie_id && this.fields.wood_specie_id.valid }">
    <label for="wood_specie_id"
           class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">
        {{ trans('admin.forest-resource.columns.wood_specie_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect
            v-model="form.woodSpecie"
            :options="$attrs.wood_species"
            :multiple="false"
            track-by="id"
            label="title"
            tag-placeholder="{{ __('Select Wood Specie') }}"
            placeholder="{{ __('Wood Specie') }}">
        </multiselect>

        <div v-if="errors.has('wood_specie_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('wood_specie_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('timber_class_id'), 'has-success': this.fields.timber_class_id && this.fields.timber_class_id.valid }">
    <label for="timber_class_id"
           class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">
        {{ trans('admin.forest-resource.columns.timber_class_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect
            v-model="form.timberClass"
            :options="$attrs.timber_classes"
            :multiple="false"
            track-by="id"
            label="title"
            tag-placeholder="{{ __('Select Timber Class') }}"
            placeholder="{{ __('Timber Class') }}">
        </multiselect>

        <div v-if="errors.has('timber_class_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('timber_class_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('bonitet_id'), 'has-success': this.fields.bonitet_id && this.fields.bonitet_id.valid }">
    <label for="bonitet_id"
           class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">
        {{ trans('admin.forest-resource.columns.bonitet_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect
            v-model="form.bonitet"
            :options="$attrs.bonitets"
            :multiple="false"
            track-by="id"
            label="title"
            tag-placeholder="{{ __('Select Bonitet') }}"
            placeholder="{{ __('Bonitet') }}">
        </multiselect>

        <div v-if="errors.has('bonitet_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('bonitet_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('forest_fund'), 'has-success': fields.forest_fund && fields.forest_fund.valid }">
    <label for="forest_fund" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forest-resource.columns.forest_fund') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.forest_fund" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('forest_fund'), 'form-control-success': fields.forest_fund && fields.forest_fund.valid}" id="forest_fund" name="forest_fund" placeholder="{{ trans('admin.forest-resource.columns.forest_fund') }}">
        <div v-if="errors.has('forest_fund')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('forest_fund') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('wood_stock'), 'has-success': fields.wood_stock && fields.wood_stock.valid }">
    <label for="wood_stock" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forest-resource.columns.wood_stock') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.wood_stock" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('wood_stock'), 'form-control-success': fields.wood_stock && fields.wood_stock.valid}" id="wood_stock" name="wood_stock" placeholder="{{ trans('admin.forest-resource.columns.wood_stock') }}">
        <div v-if="errors.has('wood_stock')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('wood_stock') }}</div>
    </div>
</div>
