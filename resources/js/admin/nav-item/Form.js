import AppForm from '../app-components/Form/AppForm';

Vue.component('nav-item-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                slug:  '' ,
                
            }
        }
    }

});