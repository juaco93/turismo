<div class="form-group row align-items-center" :class="{'has-danger': errors.has('direccion'), 'has-success': fields.direccion && fields.direccion.valid }">
    <label for="direccion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gastronomia.columns.direccion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.direccion" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('direccion'), 'form-control-success': fields.direccion && fields.direccion.valid}" id="direccion" name="direccion" placeholder="{{ trans('admin.gastronomia.columns.direccion') }}">
        <div v-if="errors.has('direccion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('direccion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gastronomia.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.gastronomia.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('localidad'), 'has-success': fields.localidad && fields.localidad.valid }">
    <label for="localidad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gastronomia.columns.localidad') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.localidad" placeholder="Localidad" label="nombre" track-by="id" :options="{{ $localidad->toJson() }}" :multiple="false" open-direction="bottom"></multiselect>
    <div v-if="errors.has('localidad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('localidad_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gastronomia.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.gastronomia.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telefono'), 'has-success': fields.telefono && fields.telefono.valid }">
    <label for="telefono" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gastronomia.columns.telefono') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefono" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telefono'), 'form-control-success': fields.telefono && fields.telefono.valid}" id="telefono" name="telefono" placeholder="{{ trans('admin.gastronomia.columns.telefono') }}">
        <div v-if="errors.has('telefono')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefono') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipo'), 'has-success': fields.tipo && fields.tipo.valid }">
    <label for="tipo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gastronomia.columns.tipo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tipo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipo'), 'form-control-success': fields.tipo && fields.tipo.valid}" id="tipo" name="tipo" placeholder="{{ trans('admin.gastronomia.columns.tipo') }}">
        <div v-if="errors.has('tipo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('web'), 'has-success': fields.web && fields.web.valid }">
    <label for="web" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gastronomia.columns.web') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.web" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('web'), 'form-control-success': fields.web && fields.web.valid}" id="web" name="web" placeholder="{{ trans('admin.gastronomia.columns.web') }}">
        <div v-if="errors.has('web')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('web') }}</div>
    </div>
</div>


