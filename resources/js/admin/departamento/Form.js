import AppForm from '../app-components/Form/AppForm';

Vue.component('departamento-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                provincia_id:  '' ,
                provincia:  '' ,
            },
            props: [
                'provincias'
            ]
        }
    }

});
