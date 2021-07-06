import AppForm from '../app-components/Form/AppForm';

Vue.component('localidade-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                departamento_id:  '' ,
                nombre:  '' ,
                departamento: '',
            },
            props: [
                'departamentos'
            ]
        }
    }

});
