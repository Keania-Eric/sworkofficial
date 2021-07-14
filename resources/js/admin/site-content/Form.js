import AppForm from '../app-components/Form/AppForm';

Vue.component('site-content-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                content:  '' ,
                slug:  '' ,
                title:  '' ,
                
            }
        }
    }

});