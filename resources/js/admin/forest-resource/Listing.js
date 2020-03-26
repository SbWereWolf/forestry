import AppListing from '../app-components/Listing/AppListing';

Vue.component('forest-resource-listing', {
    mixins: [AppListing],
    data() {
        return {
            showWoodSpeciesFilter: true,
            woodSpeciesMultiselect: {},

            filters: {
                woodSpecies: [],
            },
        }
    },

    watch: {
        showWoodSpeciesFilter: function (newVal, oldVal) {
            this.woodSpeciesMultiselect = [];
        },
        woodSpeciesMultiselect: function(newVal, oldVal) {
            this.filters.woodSpecies = newVal.map(function(object) { return object['key']; });
            this.filter('woodSpecies', this.filters.woodSpecies);
        }
    }
});
