import AppListing from '../app-components/Listing/AppListing';

Vue.component('localidade-listing', {
    mixins: [AppListing],
    data() {
        return {
            showDepartamentosFilter: false,
            departamentosMultiselect: {},

            filters: {
                departamentos: [],
            },
        }
    },

    watch: {
        showDepartamentosFilter: function (newVal, oldVal) {
            this.departamentosMultiselect = [];
        },
        departamentosMultiselect: function(newVal, oldVal) {
            this.filters.departamentos = newVal.map(function(object) { return object['key']; });
            this.filter('departamentos', this.filters.departamentos);
        }
    }
});
