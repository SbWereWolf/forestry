import AppForm from '../app-components/Form/AppForm';

Vue.component('forest-resource-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                bonitet_id:  '' ,
                forest_fund:  '' ,
                timber_class_id:  '' ,
                wood_specie_id:  '' ,
                wood_stock:  '' ,
                
            }
        }
    }

});