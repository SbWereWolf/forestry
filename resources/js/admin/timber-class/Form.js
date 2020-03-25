import AppForm from '../app-components/Form/AppForm';

Vue.component('timber-class-form', {
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