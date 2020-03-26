import AppForm from '../app-components/Form/AppForm';

Vue.component('forest-resource-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                forest_fund: '',
                wood_stock: '',
                woodSpecie: '',
                timberClass: '',
                bonitet: '',
            }
        }
    },
});
