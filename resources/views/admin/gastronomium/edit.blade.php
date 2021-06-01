@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.gastronomium.actions.edit', ['name' => $gastronomium->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <gastronomium-form
                :action="'{{ $gastronomium->resource_url }}'"
                :data="{{ $gastronomium->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.gastronomium.actions.edit', ['name' => $gastronomium->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.gastronomium.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </gastronomium-form>

        </div>
    
</div>

@endsection