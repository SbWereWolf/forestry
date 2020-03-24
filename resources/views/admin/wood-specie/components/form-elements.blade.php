<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wood-specie.columns.title') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}"
               id="title" name="title" placeholder="{{ trans('admin.wood-specie.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('calculation_period'), 'has-success': fields.calculation_period && fields.calculation_period.valid }">
    <label for="calculation_period" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wood-specie.columns.calculation_period') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.calculation_period" v-validate="'required|integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('calculation_period'), 'form-control-success': fields.calculation_period && fields.calculation_period.valid}"
               id="calculation_period" name="calculation_period"
               placeholder="{{ trans('admin.wood-specie.columns.calculation_period') }}">
        <div v-if="errors.has('calculation_period')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('calculation_period') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('timber_harvesting_age'), 'has-success': fields.timber_harvesting_age && fields.timber_harvesting_age.valid }">
    <label for="timber_harvesting_age" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wood-specie.columns.timber_harvesting_age') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.timber_harvesting_age" v-validate="'required|integer'"
               @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('timber_harvesting_age'), 'form-control-success': fields.timber_harvesting_age && fields.timber_harvesting_age.valid}"
               id="timber_harvesting_age" name="timber_harvesting_age"
               placeholder="{{ trans('admin.wood-specie.columns.timber_harvesting_age') }}">
        <div v-if="errors.has('timber_harvesting_age')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('timber_harvesting_age') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('max_timber_class'), 'has-success': fields.max_timber_class && fields.max_timber_class.valid }">
    <label for="max_timber_class" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wood-specie.columns.max_timber_class') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.max_timber_class" v-validate="'required|integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('max_timber_class'), 'form-control-success': fields.max_timber_class && fields.max_timber_class.valid}"
               id="max_timber_class" name="max_timber_class"
               placeholder="{{ trans('admin.wood-specie.columns.max_timber_class') }}">
        <div v-if="errors.has('max_timber_class')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('max_timber_class') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('main_harvesting_age'), 'has-success': fields.main_harvesting_age && fields.main_harvesting_age.valid }">
    <label for="main_harvesting_age" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wood-specie.columns.main_harvesting_age') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.main_harvesting_age" v-validate="'required|integer'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('main_harvesting_age'), 'form-control-success': fields.main_harvesting_age && fields.main_harvesting_age.valid}"
               id="main_harvesting_age" name="main_harvesting_age"
               placeholder="{{ trans('admin.wood-specie.columns.main_harvesting_age') }}">
        <div v-if="errors.has('main_harvesting_age')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('main_harvesting_age') }}
        </div>
    </div>
</div>
