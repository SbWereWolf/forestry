import AppListing from '../app-components/Listing/AppListing';

Vue.component('cutting-area-listing', {
    mixins: [AppListing],
    methods: {
        runCalc: function () {
            window.fetch(`/admin/cutting-areas/calculate`)
                .then(function (response) {
                    if (response.ok) {
                        console.info("✅, success, reload page for browse data");
                        window.location.reload();
                    }
                    if (!response.ok) {
                        console.error(`❌, ${response.statusText}`);
                    }
                })
                .catch(() => {
                    console.error("⛔, fail calculate ");
                })
        },
    }
});
