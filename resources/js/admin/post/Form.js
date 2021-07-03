import AppForm from '../app-components/Form/AppForm';

Vue.component('post-form', {
    mixins: [AppForm],
    props: ['categories'],
    data: function() {
        return {
            form: {
                title:  '' ,
                slug:  '' ,
                perex:  '' ,
                image:  '' ,
                featured:  false ,
                category:  '' ,
                author:  '' ,
                intro_text:  '' ,
                published_at:  '' ,
                enabled:  false ,
                
            },
            mediaCollections : ['image']
        }
    }

});