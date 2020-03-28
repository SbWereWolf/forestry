import AppForm from '../app-components/Form/AppForm';

Vue.component('forestry-indicator-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                avrg_bonitet:  '' ,
                avrg_class:  '' ,
                avrg_increase:  '' ,
                avrg_volume:  '' ,
                economical_section_high:  '' ,
                economical_section_low:  '' ,
                operational_fund:  '' ,
                operational_volume:  '' ,
                wood_specie_id:  '' ,
                
            }
        }
    }

});