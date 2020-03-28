import AppForm from '../app-components/Form/AppForm';

Vue.component('cutting-area-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                avrg_increase:  '' ,
                cutting_turnover:  '' ,
                first_age:  '' ,
                ripeness:  '' ,
                second_age:  '' ,
                substance:  '' ,
                wood_specie_id:  '' ,
                
            }
        }
    }

});