import AppForm from '../app-components/Form/AppForm';

Vue.component('post-category-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});