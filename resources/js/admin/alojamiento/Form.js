import AppForm from '../app-components/Form/AppForm';

Vue.component('alojamiento-form', {
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
                'localidades'
            ]
        }
    }

});
