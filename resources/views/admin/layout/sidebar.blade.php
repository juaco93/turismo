<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/alojamientos') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.alojamiento.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/gastronomias') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.gastronomia.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/provincias') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.provincia.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/departamentos') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.departamento.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/localidades') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.localidade.title') }}</a></li>

           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
