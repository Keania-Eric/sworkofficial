import AppForm from '../app-components/Form/AppForm';

Vue.component('page-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                content:  '' ,
                name:  '' ,
                slug:  '' ,
                
            }
        }
    }

});