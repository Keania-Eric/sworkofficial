import AppForm from '../app-components/Form/AppForm';

Vue.component('tagging-tag-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                slug:  '' ,
                name:  '' ,
                // suggest:  false ,
                // count:  '' ,
                // tag_group_id:  '' ,
                description:  '' ,
                
            }
        }
    }

});