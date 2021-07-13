import AppForm from '../app-components/Form/AppForm';

Vue.component('site-image-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                slug:  '' ,
                width:  '' ,
                height:  '' ,
                
            }
        }
    }

});