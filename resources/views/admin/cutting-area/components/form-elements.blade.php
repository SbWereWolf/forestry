<div class="form-group row align-items-center" :class="{'has-danger': errors.has('avrg_increase'), 'has-success': fields.avrg_increase && fields.avrg_increase.valid }">
    <label for="avrg_increase" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cutting-area.columns.avrg_increase') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.avrg_increase" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('avrg_increase'), 'form-control-success': fields.avrg_increase && fields.avrg_increase.valid}" id="avrg_increase" name="avrg_increase" placeholder="{{ trans('admin.cutting-area.columns.avrg_increase') }}">
        <div v-if="errors.has('avrg_increase')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('avrg_increase') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cutting_turnover'), 'has-success': fields.cutting_turnover && fields.cutting_turnover.valid }">
    <label for="cutting_turnover" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cutting-area.columns.cutting_turnover') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cutting_turnover" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cutting_turnover'), 'form-control-success': fields.cutting_turnover && fields.cutting_turnover.valid}" id="cutting_turnover" name="cutting_turnover" placeholder="{{ trans('admin.cutting-area.columns.cutting_turnover') }}">
        <div v-if="errors.has('cutting_turnover')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cutting_turnover') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('first_age'), 'has-success': fields.first_age && fields.first_age.valid }">
    <label for="first_age" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cutting-area.columns.first_age') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.first_age" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('first_age'), 'form-control-success': fields.first_age && fields.first_age.valid}" id="first_age" name="first_age" placeholder="{{ trans('admin.cutting-area.columns.first_age') }}">
        <div v-if="errors.has('first_age')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('first_age') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ripeness'), 'has-success': fields.ripeness && fields.ripeness.valid }">
    <label for="ripeness" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cutting-area.columns.ripeness') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ripeness" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ripeness'), 'form-control-success': fields.ripeness && fields.ripeness.valid}" id="ripeness" name="ripeness" placeholder="{{ trans('admin.cutting-area.columns.ripeness') }}">
        <div v-if="errors.has('ripeness')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ripeness') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('second_age'), 'has-success': fields.second_age && fields.second_age.valid }">
    <label for="second_age" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cutting-area.columns.second_age') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.second_age" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('second_age'), 'form-control-success': fields.second_age && fields.second_age.valid}" id="second_age" name="second_age" placeholder="{{ trans('admin.cutting-area.columns.second_age') }}">
        <div v-if="errors.has('second_age')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('second_age') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('substance'), 'has-success': fields.substance && fields.substance.valid }">
    <label for="substance" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cutting-area.columns.substance') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.substance" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('substance'), 'form-control-success': fields.substance && fields.substance.valid}" id="substance" name="substance" placeholder="{{ trans('admin.cutting-area.columns.substance') }}">
        <div v-if="errors.has('substance')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('substance') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('wood_specie_id'), 'has-success': fields.wood_specie_id && fields.wood_specie_id.valid }">
    <label for="wood_specie_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cutting-area.columns.wood_specie_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.wood_specie_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('wood_specie_id'), 'form-control-success': fields.wood_specie_id && fields.wood_specie_id.valid}" id="wood_specie_id" name="wood_specie_id" placeholder="{{ trans('admin.cutting-area.columns.wood_specie_id') }}">
        <div v-if="errors.has('wood_specie_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('wood_specie_id') }}</div>
    </div>
</div>


