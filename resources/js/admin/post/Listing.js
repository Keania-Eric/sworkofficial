import AppListing from '../app-components/Listing/AppListing';

Vue.component('post-listing', {
    mixins: [AppListing],
    data() {
        return {
            showCategoriesFilter: false,
            categoriesMultiselect: {},
    
            filters: {
                categories: [],
            },
        }
    },
    
    watch: {
        showCategoriesFilter: function (newVal, oldVal) {
            this.categoriesMultiselect = [];
        },
        categoriesMultiselect: function(newVal, oldVal) {
            this.filters.categories = newVal.map(function(object) { return object['key']; });
            this.filter('categories', this.filters.categories);
        }
    }
});