@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.gastronomia.actions.edit', ['name' => $gastronomium->email]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <gastronomia-form
                :action="'{{ $gastronomium->resource_url }}'"
                :data="{{ $gastronomium->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.gastronomia.actions.edit', ['name' => $gastronomium->email]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.gastronomia.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </gastronomia-form>

        </div>
    
</div>

@endsection