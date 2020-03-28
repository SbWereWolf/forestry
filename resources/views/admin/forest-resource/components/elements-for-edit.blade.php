<div class="form-group row align-items-center">
    <label for="wood_specie_title" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forest-resource.columns.wood_specie_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input readonly type="text" class="form-control" id="wood_specie_title" value="{{$specieTitle}}">
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('timber_class_id'), 'has-success': fields.timber_class_id && fields.timber_class_id.valid }">
    <label for="timber_class_id" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forest-resource.columns.timber_class_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input readonly type="text" class="form-control" id="timber_class_title" value="{{$timberClassTitle}}">
        <div v-if="errors.has('timber_class_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('timber_class_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('bonitet_id'), 'has-success': this.fields.bonitet_id && this.fields.bonitet_id.valid }">
    <label for="bonitet_title"
           class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">
        {{ trans('admin.forest-resource.columns.bonitet_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input readonly type="text" class="form-control" id="bonitet_title" value="{{$bonitetTitle}}">
        <div v-if="errors.has('bonitet_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('bonitet_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('forest_fund'), 'has-success': fields.forest_fund && fields.forest_fund.valid }">
    <label for="forest_fund" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forest-resource.columns.forest_fund') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.forest_fund" v-validate="'required|integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('forest_fund'), 'form-control-success': fields.forest_fund && fields.forest_fund.valid}"
               id="forest_fund" name="forest_fund"
               placeholder="{{ trans('admin.forest-resource.columns.forest_fund') }}">
        <div v-if="errors.has('forest_fund')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('forest_fund') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('wood_stock'), 'has-success': fields.wood_stock && fields.wood_stock.valid }">
    <label for="wood_stock" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forest-resource.columns.wood_stock') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.wood_stock" v-validate="'required|integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('wood_stock'), 'form-control-success': fields.wood_stock && fields.wood_stock.valid}"
               id="wood_stock" name="wood_stock" placeholder="{{ trans('admin.forest-resource.columns.wood_stock') }}">
        <div v-if="errors.has('wood_stock')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('wood_stock') }}
        </div>
    </div>
</div>
