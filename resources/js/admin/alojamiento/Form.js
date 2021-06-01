import AppForm from '../app-components/Form/AppForm';

Vue.component('alojamiento-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                direccion:  '' ,
                ciudad:  '' ,
                departamento:  '' ,
                provincia:  '' ,
                telefono:  '' ,
                web:  '' ,
                email:  '' ,
                tipo:  '' ,
                
            }
        }
    }

});