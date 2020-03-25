import AppForm from '../app-components/Form/AppForm';

Vue.component('bonitet-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                code:  '' ,
                remark:  '' ,
                title:  '' ,
                
            }
        }
    }

});