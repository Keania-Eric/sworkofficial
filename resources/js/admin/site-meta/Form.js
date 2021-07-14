import AppForm from '../app-components/Form/AppForm';

Vue.component('site-meta-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                value:  '' ,
                
            }
        }
    }

});