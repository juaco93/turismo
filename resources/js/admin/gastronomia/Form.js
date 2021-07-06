import AppForm from '../app-components/Form/AppForm';

Vue.component('gastronomia-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                direccion:  '' ,
                email:  '' ,
                localidad:  '' ,
                nombre:  '' ,
                telefono:  '' ,
                tipo:  '' ,
                web:  '' ,

            },
            props: [
                'localidad'
            ]
        }
    }

});
