<div class="form-group row align-items-center" :class="{'has-danger': errors.has('avrg_bonitet'), 'has-success': fields.avrg_bonitet && fields.avrg_bonitet.valid }">
    <label for="avrg_bonitet" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forestry-indicator.columns.avrg_bonitet') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.avrg_bonitet" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('avrg_bonitet'), 'form-control-success': fields.avrg_bonitet && fields.avrg_bonitet.valid}" id="avrg_bonitet" name="avrg_bonitet" placeholder="{{ trans('admin.forestry-indicator.columns.avrg_bonitet') }}">
        <div v-if="errors.has('avrg_bonitet')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('avrg_bonitet') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('avrg_class'), 'has-success': fields.avrg_class && fields.avrg_class.valid }">
    <label for="avrg_class" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forestry-indicator.columns.avrg_class') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.avrg_class" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('avrg_class'), 'form-control-success': fields.avrg_class && fields.avrg_class.valid}" id="avrg_class" name="avrg_class" placeholder="{{ trans('admin.forestry-indicator.columns.avrg_class') }}">
        <div v-if="errors.has('avrg_class')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('avrg_class') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('avrg_increase'), 'has-success': fields.avrg_increase && fields.avrg_increase.valid }">
    <label for="avrg_increase" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forestry-indicator.columns.avrg_increase') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.avrg_increase" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('avrg_increase'), 'form-control-success': fields.avrg_increase && fields.avrg_increase.valid}" id="avrg_increase" name="avrg_increase" placeholder="{{ trans('admin.forestry-indicator.columns.avrg_increase') }}">
        <div v-if="errors.has('avrg_increase')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('avrg_increase') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('avrg_volume'), 'has-success': fields.avrg_volume && fields.avrg_volume.valid }">
    <label for="avrg_volume" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forestry-indicator.columns.avrg_volume') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.avrg_volume" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('avrg_volume'), 'form-control-success': fields.avrg_volume && fields.avrg_volume.valid}" id="avrg_volume" name="avrg_volume" placeholder="{{ trans('admin.forestry-indicator.columns.avrg_volume') }}">
        <div v-if="errors.has('avrg_volume')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('avrg_volume') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('economical_section_high'), 'has-success': fields.economical_section_high && fields.economical_section_high.valid }">
    <label for="economical_section_high" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forestry-indicator.columns.economical_section_high') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.economical_section_high" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('economical_section_high'), 'form-control-success': fields.economical_section_high && fields.economical_section_high.valid}" id="economical_section_high" name="economical_section_high" placeholder="{{ trans('admin.forestry-indicator.columns.economical_section_high') }}">
        <div v-if="errors.has('economical_section_high')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('economical_section_high') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('economical_section_low'), 'has-success': fields.economical_section_low && fields.economical_section_low.valid }">
    <label for="economical_section_low" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forestry-indicator.columns.economical_section_low') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.economical_section_low" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('economical_section_low'), 'form-control-success': fields.economical_section_low && fields.economical_section_low.valid}" id="economical_section_low" name="economical_section_low" placeholder="{{ trans('admin.forestry-indicator.columns.economical_section_low') }}">
        <div v-if="errors.has('economical_section_low')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('economical_section_low') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('operational_fund'), 'has-success': fields.operational_fund && fields.operational_fund.valid }">
    <label for="operational_fund" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forestry-indicator.columns.operational_fund') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.operational_fund" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('operational_fund'), 'form-control-success': fields.operational_fund && fields.operational_fund.valid}" id="operational_fund" name="operational_fund" placeholder="{{ trans('admin.forestry-indicator.columns.operational_fund') }}">
        <div v-if="errors.has('operational_fund')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('operational_fund') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('operational_volume'), 'has-success': fields.operational_volume && fields.operational_volume.valid }">
    <label for="operational_volume" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forestry-indicator.columns.operational_volume') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.operational_volume" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('operational_volume'), 'form-control-success': fields.operational_volume && fields.operational_volume.valid}" id="operational_volume" name="operational_volume" placeholder="{{ trans('admin.forestry-indicator.columns.operational_volume') }}">
        <div v-if="errors.has('operational_volume')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('operational_volume') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('wood_specie_id'), 'has-success': fields.wood_specie_id && fields.wood_specie_id.valid }">
    <label for="wood_specie_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.forestry-indicator.columns.wood_specie_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.wood_specie_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('wood_specie_id'), 'form-control-success': fields.wood_specie_id && fields.wood_specie_id.valid}" id="wood_specie_id" name="wood_specie_id" placeholder="{{ trans('admin.forestry-indicator.columns.wood_specie_id') }}">
        <div v-if="errors.has('wood_specie_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('wood_specie_id') }}</div>
    </div>
</div>


